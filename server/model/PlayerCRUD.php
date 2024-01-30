<?php

namespace model;

use Exception;
use PDOException;

class PlayerCRUD {

    /**
     * @throws Exception
     */
    public static function create(PlayerDAO $player): bool {
        if (empty($player->getLogin()) || empty($player->getPassword()) || empty($player->getEmail())) {
            throw new Exception("Les champs login, mot de passe et email sont requis.");
        }
        if (!filter_var($player->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Format d'email invalide.");
        }

        try {
            $db = DB::getInstance();
            $db->beginTransaction();

            $stmt = $db->prepare("INSERT INTO player (login_player, password_player, email_player) VALUES (?, ?, ?)");
            $stmt->execute([
                $player->getLogin(),
                $player->getPassword(),
                $player->getEmail()
            ]);

            $player->setId($db->lastInsertId());
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollBack();
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public static function read(int $id): PlayerDAO {
        $db = DB::getInstance();
        $stmt = $db->prepare("SELECT * FROM player WHERE id_player = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row === false) {
            throw new Exception("Player not found in database");
        }
        $player = new PlayerDAO();
        return $player
            ->setId($id)
            ->setLogin($row["login_player"])
            ->setPassword($row["password_player"])
            ->setEmail($row["email_player"]);
    }

    public static function login($login, $password): bool {
        if (empty($login) || empty($password)) {
            return false;
        }

        try {
            $db = DB::getInstance();
            $stmt = $db->prepare("SELECT * FROM player WHERE login_player = ? AND password_player = ?");
            $stmt->execute([$login, hash("sha512", $password)]);
            $row = $stmt->fetch();

            if ($row === false) {
                return false;
            }

            $player = new PlayerDAO();
            $player->setLogin($row['login_player']);
            $player->setPassword($row['password_player']);

            return true;
        } catch (PDOException $e) {
            error_log("Erreur lors de la connexion : " . $e->getMessage());
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public static function update(PlayerDAO $player): bool {
        if (empty($player->getLogin()) || empty($player->getPassword()) || empty($player->getEmail()) || empty($player->getId())) {
            throw new Exception("Tous les champs sont requis pour la mise à jour.");
        }
        if (!filter_var($player->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Format d'email invalide.");
        }

        try {
            $db = DB::getInstance();
            $db->beginTransaction();
            $db
                ->prepare("UPDATE player SET login_player = ?, password_player = ?, email_player = ? WHERE id_player = ?")
                ->execute([
                    $player->getLogin(),
                    $player->getPassword(),
                    $player->getEmail(),
                    $player->getId()
                ]);
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollBack();
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public static function delete(PlayerDAO $player): bool {
        if (empty($player->getId())) {
            throw new Exception("L'ID du joueur est requis pour la suppression.");
        }

        try {
            $db = DB::getInstance();
            $db->beginTransaction();
            $db
                ->prepare("DELETE FROM player WHERE id_player = ?")
                ->execute([$player->getId()]);
            $db->commit();
            return true;
        } catch (PDOException $e) {
            $db->rollBack();
            return false;
        }
    }
}

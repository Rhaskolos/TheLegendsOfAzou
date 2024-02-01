<?php

namespace model;

use Exception;
use PDOException;
use DB;
use model\PlayerDAO;

class PlayerCRUD {

    public static function create(PlayerDAO $player): bool {
        $db = DB::getInstance();
        try {
            $db->beginTransaction();
            $stmt = $db->prepare("INSERT INTO player (login_player, password_player, email_player) VALUES (?, ?, ?)");
            $stmt->execute([
                $player->getLogin(),
                password_hash($player->getPassword(), PASSWORD_DEFAULT),
                $player->getEmail()
            ]);
            $player->setId($db->lastInsertId());
            return $db->commit();
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

    public static function update(PlayerDAO $player): bool {
        $db = DB::getInstance();
        try {
            $db->beginTransaction();
            $db
                ->prepare("UPDATE player SET login = ?, password = ?, email = ? WHERE id_player = ?")
                ->execute([
                    $player->getLogin(),
                    $player->getPassword(),
                    $player->getEmail(),
                    $player->getId()
                ]);
            return $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            return false;
        }
    }

    public static function delete(PlayerDAO $player): bool {
        $db = DB::getInstance();
        try {
            $db->beginTransaction();
            $db
                ->prepare("DELETE FROM player WHERE id_player = ?")
                ->execute([$player->getId()]);
            return $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            return false;
        }
    }

}

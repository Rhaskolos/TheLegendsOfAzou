<?php

namespace model;

class DB extends \PDO
{
    private static $_instance;

    private function __construct()
    {
        // TODO: switch to .env file
        $host     = "127.0.0.1";     // getenv('DB_HOST');
        $username = "root";          // getenv('DB_USERNAME');
        $password = "";              // getenv('DB_PASSWORD');
        $database = "legendsofazou"; // getenv('DB_NAME');

        try {
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_PERSISTENT => true, // Connexion persistante
                \PDO::ATTR_EMULATE_PREPARES => false, // Utilise de vraies requêtes préparées
            ];
            parent::__construct("mysql:host=$host;dbname=$database;charset=utf8", $username, $password, $options);
            $this->exec("SET NAMES 'utf8'");
        } catch (\PDOException $e) {
            // Gérer l'exception, par exemple enregistrer l'erreur dans un fichier de log
            // ou afficher un message d'erreur générique
            error_log($e->getMessage());
            exit('Une erreur de connexion à la base de données est survenue.');
        }
    }

    public static function getInstance()
    {
        if (!isset(static::$_instance)) {
            static::$_instance = new DB();
        }

        return static::$_instance;
    }


    public function closeConnection() {
        static::$_instance = null;
    }
}

<?php

namespace server\core;
use server\core\AutoloaderEnv;


// chemin absolu pour que cela fonctionne : "C:\\wamp64\\www\\TheLegendsOfAzou\\server\\core\\.env"


AutoloaderEnv::loaderEnv("C:\\wamp64\\www\\TheLegendsOfAzou\\server\\core\\.env");

class DB extends \PDO
{
    private static $_instance;
    protected int $transactionCounter = 0;
    
    

    private function __construct()
    {
        // récuperation des variables d'environnements
        $host = getenv('DB_HOST');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $database = getenv('DB_NAME');
      
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

    public function beginTransaction(): bool {
        return $this->transactionCounter++ === 0
            ? parent::beginTransaction()
            : true;
    }

    public function commit(): bool {
        return --$this->transactionCounter === 0
            ? parent::commit()
            : true;
    }

    public function rollBack(): bool {
        return --$this->transactionCounter === 0
            ? parent::rollBack()
            : true;
    }


}


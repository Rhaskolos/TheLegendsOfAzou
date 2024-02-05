<?php


class DB extends \PDO
{
    private static $_instance;
    protected int $transactionCounter = 0;
    
    

    private function __construct()
    {
        // retrieving environment variables
        $host = getenv("DB_HOST");
        $username = getenv("DB_USERNAME");
        $password = getenv("DB_PASSWORD");
        $database = getenv("DB_NAME");
      
        try {
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_PERSISTENT => true, // Persistent connection
                \PDO::ATTR_EMULATE_PREPARES => false, // Uses real prepared queries
            ];
            parent::__construct("mysql:host=$host;dbname=$database;charset=utf8", $username, $password, $options);
            $this->exec("SET NAMES 'utf8'");
        } catch (\PDOException $e) {
            // Handle the exception, for example by logging the error in a log file
            // or displaying a generic error message
            error_log($e->getMessage());
            exit("A database connection error has occurred.");
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


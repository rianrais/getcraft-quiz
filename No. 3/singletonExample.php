<?php

/**
 *  Some real-world implementation of using a singleton would be to initiate 
 *  a connection to the database. Which is important to save time, because each 
 *  new connections to the database will slow it down. 
 *
 *  Below is a demonstration on how Singleton pattern is used when
 *  initiating a database connection in PHP.
 */
Class ConnectToDatabase 
{
    private static $instance = null;
    private $connection;
    
    private $localhost = 'localhost';
    private $username = 'db user-name';
    private $password = 'db password';
    private $dbname = 'db name';
    
    private function __construct()
    {
        $this->connection = new PDO("mysql:host={$this->host};
        dbname={$this->dbname}", $this->username,$this->password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
    
    public static function getInstance()
    {
        // This will ensure that only one instance is running.
        if(!self::$instance)
        {
            self::$instance = new ConnectDb();
        }
     
        return self::$instance;
    }
    
    public function getConnection()
    {
        return $this->connection;
    }
}

?>
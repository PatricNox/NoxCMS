<?php
/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace NoxCMS\Server;
use pdo;
use Exception;

/**
* Main database handler.
*
* Here is where all the connections to the
* database goes by, through or inbetween.
*
*/
class Database
{
    /**
     * Singleton Instance.
     * 
     * This is temporary solution to let multiplie databases be
     * initialised and connected too.
     * 
     * @var string[]
     */
    public static $instance;

    /**
     * The Configuration Variables.
     *
     * @var string[]
     */
    private $DBhost;
    private $DBname;
    private $DBuser;
    private $DBpass;
    private $DBport;

    /**
     * Create a new database instance to the
     * desired database name.
     *
     * @return void
     */
    public function __construct(String $dbName)
    {
        $this->DBname   = $dbName;
        self::$instance = $this;
    }

    /**
     * Declare database configurations.
     *
     * @return void
     */
    public function config(String $host, String $user, String $pass, int $port = 3306): void
    {
        $this->DBhost = $host;
        $this->DBuser = $user;
        $this->DBpass = $pass;
        $this->DBport = $port;
        $this->Connect($this->DBname);
    }
    
    /**
     * Connect to the selected database.
     *
     * @param String $database
     * @return void
     */
    public function Connect(string $database)
    {
        try
        {
            $this->pdo = new PDO("mysql:host=$this->DBhost;dbname=$database;", $this->DBuser, $this->DBpass);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } 

        catch (Exception $e)
        {
            // Rethrow to hide connection details
            error_reporting(0);
            throw $e;
            throw new PDOException("Could not connect to database: $database");
        }
    }

     /**
     * Returns the current database.
     *
     * @return String
     */
    static function getCurrentDB(): String
    {
        // Get Current connected Database
        $instance = (self::$instance) ? get_object_vars(self::$instance) : false;

        if (!$instance) // Not connected to any database.
            throw new Exception("Not connected to any database.");

        return $instance['DBname'];
    }
}

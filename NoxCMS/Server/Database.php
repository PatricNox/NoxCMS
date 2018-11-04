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
     * @var String[]
     */
    public static $instance;

    /**
     * The Configuration Variables.
     *
     * @var String[]
     */
    private $DBhost;
    private $DBname;
    private $DBuser;
    private $DBpass;
    private $DBport;

    /**
     * Create a new database instance to the
     * desired database name.
     */
    public function __construct(String $dbName)
    {
        $this->DBname   = $dbName;
        $this->loadConfig();
        self::$instance = $this;
    }

    /**
     * Declare database configurations.
     *
     * @return Void
     */
    public function setConfig(String $host, String $user, String $pass, int $port = 3306): void
    {
        $this->DBhost = $host;
        $this->DBuser = $user;
        $this->DBpass = $pass;
        $this->DBport = $port;
        $this->connect($this->DBname);
    }
    
    /**
     * Set database configurations from Config.
     *
     * @return Void
     */
    public function loadConfig(): void
    {
        $c = require('./config.php');
        $this->SetConfig(
            $c['database']['host'], 
            $c['database']['username'], 
            $c['database']['password'], 
            $c['database']['port']
        );
    }

    /**
     * Connect to the selected database.
     *
     * @param String $database
     * @return Pdo
     */
    public function connect(string $database): pdo
    {
        try
        {
            $pdoConnection = new PDO("mysql:host=$this->DBhost;dbname=$database;", $this->DBuser, $this->DBpass);
            $pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } 

        catch (Exception $e)
        {
            // Rethrow to hide connection details
            error_reporting(0);
            throw $e;
            throw new PDOException("Could not connect to database: $database");
        }

        return $pdoConnection;
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

     /**
     * Returns the current version of NoxCMS.
     *
     * @return String
     */
    public function getVersion(): String
    {
        // Establish temponare connection.
        $dbConn = $this->Connect(Database::getCurrentDB());

        // Select our version from Database.
        $query = $dbConn->prepare("SELECT `version` FROM `version` LIMIT 1");
        $result = $query->execute();
        if (!$result)
            throw new Exception("Version not found.");
        
        return $result;
    }
}

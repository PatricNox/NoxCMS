<?php
/**
*
* This file is part of the NoxCMS Core package.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace noxcms\Server;
use pdo;
use PDOException;

// TODO: Split up methods into extension class

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
        $c = require($_SERVER['DOCUMENT_ROOT'].'/config.php');
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
    public function connect(string $database)
    {
        // instantiate connection for later return
        $pdoConnection = null;

        try // to connect
        {
            $pdoConnection = new PDO("mysql:host=$this->DBhost; dbname=$database;", $this->DBuser, $this->DBpass, 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); 
            $pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } 

        // Avoid printing database info at this point.
        catch (PDOException $e){}

        return ($pdoConnection) ?: false;
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
            throw new PDOException("Not connected to any database.");

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
            throw new PDOException("Version not found.");
        
        return $result;
    }

     /**
     * Queries to database.
     *
     * @return Bool
     */
    public function query(String $query): array
    {  
        // Establish temporary connection.
        $dbConn = $this->Connect(Database::getCurrentDB());

        // Run the written query towards the Database.
        $query  = $dbConn->prepare($query);
        $result = $query->execute();

        if (!$result)
        {
            throw new PDOException("Could not Query!");
            return false;
        }
        
        return $query->fetchAll(PDO::FETCH_ASSOC);;
    }
}

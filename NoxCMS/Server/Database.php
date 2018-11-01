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
        $this->DBname = $dbName;
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
        $this->Connect();
    }
    
    /**
     * Connect to the selected database.
     *
     * @return void
     */
    public function Connect()
    {
        try
        {
            $this->pdo = new PDO("mysql:host=$this->DBhost;dbname=$this->DBname;", $this->DBuser, $this->DBpass);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } 

        catch (Exception $e)
        {
            // Rethrow to hide connection details
            error_reporting(0);
            throw $e;
            throw new PDOException("Could not connect to database.");
        }
    }
}

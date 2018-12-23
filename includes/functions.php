<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

use NoxCMS\Server\Database;
    
/**
* Global path correction for UNIX, WIN and OSX.
*
* @param String $path 
* @return String
*/
function _path(string $path): string
{
    $specifiedPath = str_replace('\\', "/", $path);
    return $specifiedPath;
}

/**
* Function with condition checks
* with purpose to declare whether the CMS 
* is installed or not.
*
* @return Bool
*/
function CheckInstallation(): bool
{
    // Check whether there is a declared database,
    // and if the configuration for it is correct.
  try 
  {
    // Establish temporary connection to 
    // the CMS core database. 
    //
    // Users never choose CMS database names, this is 
    // all done automagically by core elsewhere.

    // Are the configurations correct?
    $tempConnect = new Database(Database::getCurrentDB());
    $dbExists    = $tempConnect->connect(Database::getCurrentDB());
    
    // Does the database exist?
    if (!$dbExists)
        return false;
        
    // Does the database have population?
    $tempConnect->getVersion();
  }
   catch (PDOException $f) 
   {
       // invalid Config or unpopulated Database
        return false;
   }
    // Else it means we are installed!
    return true;
}

/**
* Function to parse SQL files.
* Returns queries stripped of comments.
*
* @return String
*/
function ParseSQLFile($file) : String
{
     $query = @fread(@fopen($file, 'r'), @filesize($file));
     return $query;
}

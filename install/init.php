<?php

/**
*
* This file is the handler of NoxCMS installation.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

require '../noxcms/Server/Database.php';
use NoxCMS\Server\Database;
    
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
{
  header("Location: javascript://history.go(-1)");
  exit;
}
   
// TODO: Update & change the complete vaidator behavior
// TODO: using Errorhandler class and do poper sanity check on fields.
// TODO: Sanity check tables for input & potentional existings

$errorMessages= array();

// General Settings
if (empty($_POST['webname']) || empty($_POST['prefix']))
    $errorMessages[] = "ERROR: The website name or website prefix were not set. Check the General Settings section and make sure you have filled all fields.";

// Configuration Settings
if (empty($_POST['dbuser']) || empty($_POST['dbpass']))
    $errorMessages[] = "ERROR: The database credentials were not set. Check the Configuration section and make sure you have filled all fields.";

// Configuration Settings
if (empty($_POST['uuser']) || empty($_POST['upass']))
    $errorMessages[] = "ERROR: The user password or username were not set. Check the Configuration section and make sure you have filled all fields.";
else if (strcmp($_POST['upass'], $_POST['upass2']))
    $errorMessages[] = "ERROR: The password confirmation field does not match the password provided.";

if (!empty($errorMessages))
{
    foreach($errorMessages as $message)
    {
        echo '<p>'.$message.'</p>';
    }
    die();
}

// TODO: proper sanitizing declaration
$webname = $_POST['webname'];
$username = $_POST['uuser'];
$userpassword = $_POST['upass'];
// TODO: Run table creations from a file
// TODO: Support "SQL updates"

/** 
 * Creation of Database
 * 
*/

// TODO: use dbuser/dbpass on DatabaseClass->configure method
$install = new Database("noxcms");

// Create Database
$install->query("
    CREATE DATABASE IF NOT EXISTS noxcms;
");

// Account table
$install->query("
    CREATE TABLE account(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(32) NOT NULL,
    sha_pass_hash varchar(40),
    sessionkey varchar(80),
    reg_mail varchar(255),
    user_mail varchar(255),
    online tinyint(3),
    PRIMARY KEY (id)
    );
");

// Account Access table
$install->query("
    CREATE TABLE account_access(
    id int NOT NULL,
    staffgroup tinyint(3) NOT NULL,
    PRIMARY KEY (id)
    );
");

// post_body table
$install->query("
    CREATE TABLE post_body(
    post_id int AUTO_INCREMENT,
    author_id int(10) NOT NULL,
    post_title varchar(255),
    content varchar(255),
    public tinyint(3),
    PRIMARY KEY (post_id)
    );
");

// routes table
$install->query("
    CREATE TABLE routes(
    route_id int NOT NULL AUTO_INCREMENT,
    route_name varchar(255),
    route_path varchar(255) NOT NULL,
    controller varchar(255) NOT NULL,
    public tinyint(3),
    active tinyint(3),
    PRIMARY KEY (route_id)
    );
");

// Version table
$install->query("
    CREATE TABLE version(
    version int NOT NULL,
    hash varchar(255) NOT NULL,
    webname varchar(255) NOT NULL,
    stable tinyint(3) NOT NULL,
    PRIMARY KEY (version)
    );
");


/** 
 * The Userinput process
 * 
*/
// Todo: select id from account to insert _Access
$install->query("
    -- VERSION & WEBNAME
    INSERT INTO version(version, hash, webname, stable)
    VALUES(1, 'c8fjdkjjfk434s', '$webname', 0);

    -- ADMIN ACCOUNT
    INSERT INTO account(username, sha_pass_hash)
    VALUES('$username', '$userpassword');
    INSERT INTO account_access(id, staffgroup)
    VALUES(1, 1);

    -- DEFAULT ROUTES
    INSERT INTO routes(route_name, route_path, controller, public, active)
    VALUES
        ('', '/', 'web', 1, 1),
        ('admin', '/admin', 'acp', 1, 1),
        ('home', '/', 'web', 1, 1),
        ('register', '/register', 'web', 1, 1),
        ('forum', '/forum', 'web', 1, 1)
        ;
");


/** 
 * Welcome content for post_body
 * 
*/
$install->query("
    -- WELCOME POST
    INSERT INTO post_body(author_id, post_title, content, public)
    VALUES
    (1, 'Welcome', 'Welcome to NoxCMS!\n\n to begin, visit /admin', 1),
    (1, 'About', 'Did you know that this CMS is made by github.com/PatricNox?', 1),
    (1, 'Fun fact', 'There are no third party libraries used so far whatsoever! \n\neven though it surely would\'ve helped alot..', 1);
    ");

header("Location: /");

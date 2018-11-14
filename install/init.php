<?php

/**
*
* This file is the handler of NoxCMS installation.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

require '../NoxCMS/Server/Database.php';
use NoxCMS\Server\Database;
    
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
{
  header("Location: javascript://history.go(-1)");
  exit;
}
   
// TODO: Update & change the complete vaidator behavior
// TODO: using Errorhandler class and do poper sanity check on fields.
// TODO: Sanity check tables for input & potentional existings

// General Settings
if (empty($_POST['webname']) || empty($_POST['prefix']))
    die("temp error display: general settings fields not filled out");

// Configuration Settings
if (empty($_POST['dbuser']) || empty($_POST['dbpass']))
    die("temp error display: Configuration settings fields not filled out");

// Configuration Settings
if (empty($_POST['uuser']) || empty($_POST['upass'] || empty($_POST['upass2'])))
    die("temp error display: Configuration settings fields not filled out");

// TODO: proper sanitizing declaration
$webname = $_POST['webname'];
$u = $_POST['uuser'];
$p = $_POST['upass'];
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
    USE noxcms;
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
    USE noxcms;
    CREATE TABLE account_access(
    id int NOT NULL,
    staffgroup tinyint(3) NOT NULL,
    PRIMARY KEY (id)
    );
");

// post_body table
$install->query("
    USE noxcms;
    CREATE TABLE post_body(
    post_id int AUTO_INCREMENT,
    author_id int(10) NOT NULL,
    content varchar(255),
    public tinyint(3),
    PRIMARY KEY (post_id)
    );
");

// routes table
$install->query("
    USE noxcms;
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
    USE noxcms;
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
    USE noxcms;
    -- VERSION & WEBNAME
    INSERT INTO version(version, hash, webname, stable)
    VALUES(1, 'c8fjdkjjfk434s', '$webname', 0);

    -- ADMIN ACCOUNT
    INSERT INTO account(username, sha_pass_hash)
    VALUES('$u', '$p');
    INSERT INTO account_access(id, staffgroup)
    VALUES(1, 1);

    -- DEFAULT ROUTES
    INSERT INTO routes(route_name, route_path, controller, public, active)
    VALUES
        ('', '/', 'web', 1, 1),
        ('admin', '/admin', 'acp', 1, 1);
");


/** 
 * Welcome content for post_body
 * 
*/
$install->query("
    USE noxcms;
    -- WELCOME POST
    INSERT INTO post_body(author_id, content, public)
    VALUES(1, 'Welcome to NoxCMS!\n\n to begin, visit /admin', 1);
    ");

$p = $_SERVER['DOCUMENT_ROOT'];
header("Location: /");

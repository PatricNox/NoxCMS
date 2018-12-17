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
require($_SERVER['DOCUMENT_ROOT']."/includes/functions.php");
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
$install->query(ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/create/database.sql"));

// Account table
$install->query(ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/create/account_table.sql"));

// Account Access table
$install->query(ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/create/account_access_table.sql"));

// post_body table
$install->query(ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/create/post_body_table.sql"));

// routes table
$install->query(ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/create/routes_table.sql"));

// Version table
$install->query(ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/create/version_table.sql"));


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
");


/** 
 * Welcome content for post_body
 * 
*/
$install->query(ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/base/base_content.sql"));

$p = $_SERVER['DOCUMENT_ROOT'];
header("Location: /");

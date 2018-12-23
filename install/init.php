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
 * Set up database structure - create database, tables and fill initial data.
 * 
*/

// TODO: use dbuser/dbpass on DatabaseClass->configure method
$install = new Database("noxcms");

$version = sprintf("    
    -- VERSION & WEBNAME
    INSERT INTO version(version, hash, webname, stable)
    VALUES(1, 'c8fjdkjjfk434s', '%s', 0);", $webname);

$adminAccount = sprintf("
    -- ADMIN ACCOUNT
    INSERT INTO account(username, sha_pass_hash)
    VALUES('%s', '%s');", $u, $p);

$accountAccess = "INSERT INTO account_access(id, staffgroup) VALUES(1, 1);";

$filePaths = glob($_SERVER['DOCUMENT_ROOT']."/install/sql/*/*.sql");

$statementArray = array(
    ParseSQLFile($_SERVER['DOCUMENT_ROOT']."/install/sql/database.sql") // We must ensure the database is created first.
);

foreach($filePaths as $path)
    $statementArray[] = ParseSQLFile($path);

array_push($statementArray, $version, $adminAccount, $accountAccess);

$install->ProcessTransaction($statementArray);

$p = $_SERVER['DOCUMENT_ROOT'];
header("Location: /");

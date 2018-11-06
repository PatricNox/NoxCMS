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

// General Settings
if (empty($_POST['webname']) || empty($_POST['prefix']))
    die("temp error display: general settings fields not filled out");

// Configuration Settings
if (empty($_POST['dbuser']) || empty($_POST['dbpass']))
    die("temp error display: Configuration settings fields not filled out");

// Configuration Settings
if (empty($_POST['uuser']) || empty($_POST['upass'] || empty($_POST['upass2'])))
    die("temp error display: Configuration settings fields not filled out");

// TODO: Sanity check tables for input & potentional existings

$install = new Database("noxcms");;

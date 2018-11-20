<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

require '../../../NoxCMS/Server/Database.php';
use NoxCMS\Server\Database;
    
if ((strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') || $_POST['post_id'] === NULL)
{
  header("Location: javascript://history.go(-1)");
  exit;
}

// Split array into variables
$postid     = $_POST['post_id'];
$post_title = $_POST['update_post_title'];
$post       = $_POST['update_content'];

// Determine type of action
($_POST['update_post']) ? $type = "UPDATE":null;
($_POST['delete_post']) ? $type = "DELETE":null;
($type) ?? header("Location: javascript://history.go(-1)");

// Act depending on type
$subconn = new Database("noxcms"); // First establish subconn
 switch ($type)
 {
     case 'DELETE':
        $subconn->query("USE noxcms; DELETE FROM post_body WHERE post_id=$postid;");
        header("Location: /admin");
        exit;
        break;
     case 'UPDATE':
        $subconn->query("USE noxcms;
            UPDATE post_body
            SET  post_title ='$post_title', content = '$post'
            WHERE post_id='$postid';");
        header("Location: /admin");
        exit;
        break;    
     default:
         break;
 }

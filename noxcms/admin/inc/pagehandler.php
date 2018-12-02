<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

require '../../../NoxCMS/Server/Database.php';
use NoxCMS\Server\Database;
    
if ((strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST'))
{
  header("Location: javascript://history.go(-1)");
  exit;
}

// Split array into variables
$pageid     = $_POST['page_id'];
$pName      = $_POST['pageName'];
$isPublic   = ($_POST['public']) ? 1 : 0;
$isActive   = ($_POST['active']) ? 1 : 0;

// Determine type of action
($_POST['update_p']) ? $type = "UPDATE":null;
($_POST['delete_p']) ? $type = "DELETE":null;
($_POST['create_p']) ? $type = "INSERT":null;
($type) ?? header("Location: javascript://history.go(-1)");

// Act depending on type
$subconn = new Database("noxcms"); // First establish subconn
 switch ($type)
 {
     case 'DELETE':
        $subconn->query("USE noxcms; DELETE FROM routes WHERE route_id=$pageid;", "noxcms");
        header("Location: /admin?pages");
        exit;
        break;
     case 'UPDATE':
        $subconn->query("USE noxcms;
            UPDATE routes
            SET  route_name ='$pName'
            WHERE route_id='$pageid';", "noxcms");
        header("Location: /admin?pages");
        exit;
        break;
     case 'INSERT':
        $subconn->query("USE noxcms;
        INSERT INTO routes(route_name, route_path, controller, public, active)
        VALUES
            ('$pName', '/$pName', 'web', $isPublic, $isActive);
        ", "noxcms");
        header("Location: /admin?pages");
        exit;
        break;       
     default:
         break;
 }

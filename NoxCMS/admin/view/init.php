<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

// This is the initialiser for ACP view.
// The very same design is loaded for installer.

if (!$_GET) // index view (no subpage)
    $_GET['/'] = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="NoxCMS/admin/view/stylesheet.css">
    <title><?=$title?></title>
</head>
<body>
    <div id="_wrap">
        <?php require __DIR__._path('/menu.php');?>
        <div class="acp_body">
            <?php
                // Define which body view to load
                foreach ($_GET as $page => $uri)
                {
                    switch ($page)
                    {                        
                        default:
                            // Attach content from Database
                            $posts = $cms->query("SELECT * FROM post_body");
                            require __DIR__._path('/view_cms.php');
                            break;
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>

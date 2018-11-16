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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="NoxCMS/admin/view/stylesheet.css">
    <title><?=$title?></title>
</head>
<body>
    <?php require __DIR__._path('/view_cms.php');?>
</body>
</html>
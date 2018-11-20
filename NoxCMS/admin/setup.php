<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

// Attach content from Database
$posts = $cms->query("SELECT * FROM post_body");

// Initialise the view
require_once __DIR__._path('/view/init.php');
<?php
/**
*
* This file is part of the NoxCMS Core package.
* Following document relates to the installation part.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

define('IN_INSTALL', true);
$title = 'NoxCMS Installer';

// Load install view
// the whole install dir is removed upon completed installation.
require __DIR__._path('/../../install/template/overall_template.php');

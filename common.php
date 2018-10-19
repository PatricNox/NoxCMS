<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* Minimum Requirement: PHP 5.3.9
*/

if (!defined('IN_NOXCMS'))
    exit;

use NoxCMS\Client\Http\Request;
use NoxCMS\Client\Http\Router;

require(__DIR__.'/vendor/autoload.php');
require($_root . 'includes/functions.' . $phpEx);
require($_root . 'includes/startup.' . $phpEx);

// Setup Routes for the
// Staff respective User view
$router = new Router([
    // DEFAULT
    ''           => $_root.'/NoxCMS/controllers/web.php',
    // ADMIN CONTROL PANEL
    'admin'      => $_root.'/NoxCMS/controllers/acp.php',
]);

require $router->navigate(Request::uri());

#todo
if (!defined('NOXCMS_INSTALLED'))
{
    // Redirect the user to the installer
}

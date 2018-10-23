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

require($_root . 'includes/startup.' . $phpEx);
require($_root . 'includes/functions.' . $phpEx);
// Setup routes for the site.
// Staff respective User (default) view
$router = new Router([
    // DEFAULT
    ''           => $_root.'/NoxCMS/controllers/web.php',
    // ADMIN CONTROL PANEL
    'admin'      => $_root.'/NoxCMS/controllers/acp.php',
    // INSTALLER
    # TODO: Route specify /install along with folder 
    'installer'    => $_root.'/NoxCMS/controllers/installer.php',
]);

require $router->navigate(Request::uri());

 // Redirect the user to the installer
if (!defined('NOXCMS_INSTALLED'))
{
    // Don't play around if we already are there
    if (defined('IN_INSTALL') && IN_INSTALL == true)
        return;

    $router->redirect('installer');
}

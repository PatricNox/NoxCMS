<?php

/**
*
* This file handles the initialisation of the NoxCMS Core.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* Minimum Requirement: PHP 5.5.X
*/

if (!defined('IN_NOXCMS'))
    exit;   

use NoxCMS\Client\Http\Router;

// Define whether the CMS is installed or not
if (!file_exists($_root . 'install/init.php'))
    define('NOXCMS_INSTALLED', true);

// Ensure composer autoload is loaded
if (!file_exists($_root . 'vendor/autoload.php'))
{
    trigger_error(
        'Composer dependencies have not been set up yet!'.
        E_USER_ERROR
    );
}

else
    require($_root . 'vendor/autoload.php');

// Setup the main routes for the site.
// User view, Admin view and the install page.
$router = new Router([
    // DEFAULT
    ''           => $_root.'/NoxCMS/controllers/web.php',
    // ADMIN CONTROL PANEL
    'admin'      => $_root.'/NoxCMS/controllers/acp.php',
    // INSTALLER
    # TODO: Route specify /install along with folder 
    'installer'  => $_root.'/NoxCMS/controllers/installer.php',
]);

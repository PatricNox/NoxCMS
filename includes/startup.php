<?php

/**
*
* This file handles the initialisation of the NoxCMS Core.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* Minimum Requirement: PHP 5.5.X
*/

if (!defined('IN_NOXCMS'))
    exit;   

use NoxCMS\Client\Http\Router;
use NoxCMS\Server\Database;
\Patchwork\Utf8\Bootup::initAll(); 
\Patchwork\Utf8\Bootup::filterRequestInputs(); 

// Core CMS database initialisations
// TODO: Split up the main DB into more databases.
$cms = new Database('noxcms');
// new Database('NoxCMS_auth');

// Define whether the CMS is installed or not
define('NOXCMS_INSTALLED', CheckInstallation());

// Load CMS if installed
if (NOXCMS_INSTALLED === true)
{
    // Ensure install files remains
    if (!file_exists($_root . 'install/init.php'))
        die("Install files are missing.");

    /// TODO: setup routes from DB
    
}

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

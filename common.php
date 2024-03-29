<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* Minimum Requirement: PHP 5.3.9
*/

if (!defined('IN_NOXCMS'))
    exit;

use NoxCMS\Client\Http\Request;
define('DS', DIRECTORY_SEPARATOR);
require($_root . 'vendor'.DS.'autoload.' . $phpEx);
require($_root . 'includes'.DS.'functions.' . $phpEx);
require($_root . 'includes'.DS.'startup.' . $phpEx);

// Initialise our base routes
require $router->navigate(Request::uri());
\Patchwork\Utf8\Bootup::filterRequestUri(); 

 // Redirect the user to the installer
if (!defined('NOXCMS_INSTALLED') || NOXCMS_INSTALLED != true)
{
    // Don't play around if we already are there
    if (defined('IN_INSTALL') && IN_INSTALL == true)
        return;

    require_once $router->redirect('installer');
}

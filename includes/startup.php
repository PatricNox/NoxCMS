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

if (!file_exists($_root . 'vendor/autoload.php'))
{
    trigger_error(
        'Composer dependencies have not been set up yet!'.
        E_USER_ERROR
    );
}

else
    require($_root . 'vendor/autoload.php');

$router = new Router([
    ''           => $_root.'/NoxCMS/controllers/web.php',
    'admin'      => $_root.'/NoxCMS/controllers/acp.php',
]);

require $router->navigate(Request::uri());

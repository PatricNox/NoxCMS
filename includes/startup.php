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

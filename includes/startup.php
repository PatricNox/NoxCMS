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
    

if (!file_exists($_root . 'vendor/autoload.php'))
{
    trigger_error(
        'Composer dependencies have not been set up yet!'.
        E_USER_ERROR
    );
}

else
    require($_root . 'vendor/autoload.php');

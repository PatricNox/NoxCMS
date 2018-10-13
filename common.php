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

require(__DIR__.'/vendor/autoload.php');
require($_root . 'includes/functions.' . $phpEx);
require($_root . 'includes/startup.' . $phpEx);


#todo
if (!defined('NOXCMS_INSTALLED'))
{
    // Redirect the user to the installer
}

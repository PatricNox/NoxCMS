<?php
/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

define('IN_NOXCMS', true);
$_root = (defined('NOXCMS_ROOT')) ? NOXCMS_ROOT : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($_root . 'common.' . $phpEx);
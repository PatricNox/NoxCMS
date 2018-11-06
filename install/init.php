<?php

/**
*
* This file is the handler of NoxCMS installation.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
{
  header("Location: javascript://history.go(-1)");
  exit;
}
   
<?php

/**
*
* This file is part of the NoxCMS Core package.
*
* @CopyRight (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/


    
if ((strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST'))
{
  header("Location: javascript://history.go(-1)");
  exit;
}

// Split array into variables
$isPublic   = ($_POST['public']) ? 1 : 0;

// magic
if ($isPublic) 
{
    // Rename current
    rename('theme/template/NoxCMS', 'theme/template/NoxCMS3');
    // Rename other
    rename('theme/template/NoxCMS2', 'theme/template/NoxCMS');
    // ok
     rename('theme/template/NoxCMS3', 'theme/template/NoxCMS2');
    
    header("Location: javascript://history.go(-1)");
}
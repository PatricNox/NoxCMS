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
* Global path correction for UNIX, WIN and OSX.
*
* @param string $path 
* @return string
*/
function _path(string $path): string
{
    $specifiedPath = str_replace('\\', "/", $path);
    return $specifiedPath;
}

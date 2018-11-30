<?php
namespace NoxCMS\Client\Http;

/**
*
* This file is part of the NoxCMS Core package.
*
* @author PatricNox <hello@PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

class Request
{
    /**
     * Aquire the current request URI.
     *
     * @return string
     */
    public static function uri(): string
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}

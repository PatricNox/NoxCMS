<?php
namespace NoxCMS\Client\Http;
use Exception;

/**
*
* This file is part of the NoxCMS Core package.
*
* @Copyright (c) PatricNox <https://PatricNox.info>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

class Router
{
    /**
     * The routes array.
     *
     * @var String[]
     */
    protected $routes;

    /**
     * Iniate a new router instance.
     *
     * @param Array $routes
     *
     */
    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }

    /**
     * Direct a route to its view.
     *
     * @param String $uri
     *
     * @return String
     */
    public function navigate(string $uri)
    {
        // Ignore $_GET variables
        $uri = explode("?", $uri);
        $uri = $uri[0];

        if (array_key_exists($uri, $this->routes))
        {
            return $this->routes[$uri];
        }

        throw new Exception('No route defined for this URI.');
    }

    /**
     * Redirect a route to its view.
     *
     * @param String $uri
     *
     * @return String
     */

    public function redirect(string $uri): string
    {
        if (!headers_sent())
        {
            // Ignore $_GET variables
            $uri = explode("?", $uri);
            $real = ($uri[1]) ? $uri[0].=$uri[1] : $uri[0];
             if (array_key_exists($uri[0], $this->routes))
            {
                header("Location:".$real, TRUE, 302);
                exit;
            }
        }

        exit('<meta http-equiv="refresh" content="0; url='.$this->routes[$uri[0]].'" />');
    }
    
}

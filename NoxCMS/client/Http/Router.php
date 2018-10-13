<?php
namespace NoxCMS\Http;
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
     * @var string[]
     */
    protected $routes;

    /**
     * Iniate a new router instance.
     *
     * @param array $routes
     *
     * @return void
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Direct a route to its view.
     *
     * @param string $uri
     *
     * @return string
     */
    public function navigate(string $uri): string
    {
        if (array_key_exists($uri, $this->routes))
        {
            return $this->routes[$uri];
        }

        throw new Exception('No route defined for this URI.');
    }
}

<?php
/**
 * --------------------------------------------------------------------------------------------------------------------
 * Qubit
 * --------------------------------------------------------------------------------------------------------------------
 * Qubit is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 *
 * Qubit is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See theGNU General Public License for more details.
 * --------------------------------------------------------------------------------------------------------------------
 * @copyright  Copyright (c) 2011 - 2012 Robot United (http://www.robotunited.com)
 * @license    http://www.gnu.org/licenses/gpl.html  GPL License
 * @version    0.0.1
 * @link       http://www.robotunited.com/open_source/qubit
 * @since      Version 0.0.1
 * --------------------------------------------------------------------------------------------------------------------
 */

/**
 * --------------------------------------------------------------------------------------------------------------------
 * Qubit Router Class
 * --------------------------------------------------------------------------------------------------------------------
 * Breaks the current URI into an array for use by the dispatchers and controllers. Expects the URI to adhere to the
 * following format:
 *
 *      example.com/dispatcher/controller/action/parameter1/parameter2
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    core
 * @subpackage  router
 * --------------------------------------------------------------------------------------------------------------------
 */
class core_services_router
{

    /**
     * Class Constructor
     *
     * Creates an array out of the $_SERVER['REQUEST_URI'] variable.
     */
	public function __construct()
    {
        $uri = strip_tags(strtolower(trim($_SERVER['REQUEST_URI'])));
        $this->uri = explode('/', $uri);
		array_shift($this->uri);

        // Ignore index.php
        if ($this->uri[0] == 'index.php') {
            array_shift($this->uri);
        }
	}

    /**
     * Get Routes
     *
     * Creates a single-dimensional associative array of the routes requested in the URI.
     * If $route is requested, the array item is returned.
     *
     * @param string $route
     * @return array $routes
     */
	public function getRoutes($route = NULL)
    {
		$this->cleanUri();
		$this->setDefaultRoutes();

        $routes = array(
			'dispatcher' => $this->uri[0],
			'controller' => $this->uri[1],
			'action' => $this->uri[2]);

		if (!empty($route)) {
			return $routes[$route];
		}

		return $routes;
	}

    /**
     * Set Default Routes
     *
     * Each route is set with an index() method by default. For example, if a disaptacher route is
     * sent in the URI without a controller request, the index() controller will be called.
     *
     */
	private function setDefaultRoutes()
    {
		for ($i = 0; $i <= 2; $i++) {
			if (empty($this->uri[$i])) {
				$this->uri[$i] = 'index';
			}
		}
	}

    /**
     * Get Parameters
     *
     * Returns an array of parameters, i.e. any URI items after the action() method. If $parameter
     * is requested, the specific array item is returned.
     *
     * @return array or FALE on error
     */
	public function getParameters($parameter = NULL)
    {
		if (!empty($this->uri[3])) {
			$last = end($this->uri);
			$key = array_search($last, $this->uri);
			$key++;

			$k = 0;
			$parameters = array();

			for ($i = 3; $i <= $key; ++$i) {
                if (!empty($this->uri[$i])) {
                    $parameters[$k++] = $this->uri[$i];
                }
			}

            if ($parameter !== NULL) {
                return $parameters[$parameter];
            } else {
                return $parameters;
            }
        }
        return FALSE;
	}

	/**
     * Clean URI
     *
	 * Removes all characters except letters, numbers, underscore, period, and dash.
	 */
	private function cleanUri()
    {
		foreach ($this->uri as &$uri) {
			$uri =  preg_replace('/[^a-zA-Z0-9._-]/', '', $uri);
		}
		unset($uri);
	}
}
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
 * Qubit Dispatcher Abstract Class
 * --------------------------------------------------------------------------------------------------------------------
 * Abstract class for dispatchers. Dispatchers act as a factory-like class by instantiating controller objects.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    core
 * @subpackage  dispatcher
 * --------------------------------------------------------------------------------------------------------------------
 */
abstract class core_services_dispatcher
{
    /**
     *  Class Constructor
     *
     * Checks route for controller and calls the method if it exists or calls the index() method if it
     * does not.
     */
    public function __construct() {
		$router = new core_services_router;
		$routes = $router->getRoutes();
		$controller = $routes['controller'];

		if (method_exists($this, $controller)) {
			$this->$controller();
		} else {
            $this->index();
        }
    }

    /**
     * Default Method for all Controllers
     */
    abstract function index();

}

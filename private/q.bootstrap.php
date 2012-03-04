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
 * ------------------------------------------------------------------------------------------------
 * APPLICATION CONFIG FILES
 * ------------------------------------------------------------------------------------------------
 */

    require Q_PRIVATE_DIR . DS . 'assets' . DS . 'configs' . DS . 'db.config.php';
    require Q_PRIVATE_DIR . DS . 'assets' . DS . 'configs' . DS . 'q.config.php';

/**
 * ------------------------------------------------------------------------------------------------
 * CLASS AUTOLOAD FUNCTION
 * ------------------------------------------------------------------------------------------------
 */

    spl_autoload_register('__qAutoload');

    /**
     * __qAutoload
     *
     * @param string $class
     * @return null
     */
	function __qAutoload($class)
    {
		$class = str_replace("_", DS, $class) . '.php';

        if (file_exists(Q_PRIVATE_DIR . DS . $class)) {
            require Q_PRIVATE_DIR . DS . $class;
        }
	}

/**
 * ------------------------------------------------------------------------------------------------
 * SESSIONS INIT
 * ------------------------------------------------------------------------------------------------
 */

    session_start();

/**
 * ------------------------------------------------------------------------------------------------
 * DISPATCHER
 * ------------------------------------------------------------------------------------------------
 */

    $router = new core_services_router();
    $routes = $router->getRoutes();


    define('Q_CURRENT_URI', $routes['dispatcher'] . '/' . $routes['controller']);
//echo Q_CURRENT_URI; exit();
	$d = 'dispatchers_' . $routes['dispatcher'];
    $dispatcher = NULL;
    if (class_exists($d)) {
        $dispatcher = new $d();
    } else {
        // Unknown Dispatcher
        $template = new core_services_template(Q_TEMPLATE_DIR);
        $template->getTemplateFile('_errors/404.php');
    }
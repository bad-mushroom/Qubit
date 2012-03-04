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
 * APPLICATION REQUIREMENTS
 * --------------------------------------------------------------------------------------------------------------------
 */

    if (phpversion() < '5.2.0') {
        die('Qubit requires php version 5.2.0 or greater. Version ' . phpversion() .' is installed.');
    }

/**
 * --------------------------------------------------------------------------------------------------------------------
 * APPLICATION CONSTANTS
 * --------------------------------------------------------------------------------------------------------------------
 */

    // Debug Level
    define('ENVIRONMENT', 'development');

    // Application Version
    define('Q_VERSION', '0.0.1');

    // OS Directory Seperator
    define('DS', DIRECTORY_SEPARATOR);

    // Root Application Paths
    define('Q_PUBLIC_DIR', str_replace('\\', '/', dirname(__FILE__)));
    define('Q_PRIVATE_DIR', dirname(Q_PUBLIC_DIR) . DS . 'private');

    // Set Server Time Zone
    date_default_timezone_set('America/Detroit');

/**
 * --------------------------------------------------------------------------------------------------------------------
 * DEBUG LEVEL
 * --------------------------------------------------------------------------------------------------------------------
 */

    if (defined('ENVIRONMENT')) {

        switch (ENVIRONMENT) {

			// Show all errors
            case 'development':
               // mysqli_report(MYSQLI_REPORT_ALL);
                mysqli_report(MYSQLI_REPORT_OFF);
                error_reporting(-1);
                break;

			// Hides errors
            case 'production':
                error_reporting(0);
                break;

            default:
                exit();
        }
    }

/**
 * --------------------------------------------------------------------------------------------------------------------
 * LAUNCH BOOTSTRAP
 * --------------------------------------------------------------------------------------------------------------------
 */

    require Q_PRIVATE_DIR . DS . 'q.bootstrap.php';
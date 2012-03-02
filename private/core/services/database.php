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
 * Qubit Database Connection Class
 * --------------------------------------------------------------------------------------------------------------------
 * Connects to database.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    core
 * @subpackage  database
 * --------------------------------------------------------------------------------------------------------------------
 * @todo Use PDO
 * @todo Connection strings for other database types
 */
class core_services_database
{
    public static function getConnection()
    {


        switch (DB_DRIVER) {

            case 'mysql':

                try {
                    $connection = new PDO("mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE."", DB_USERNAME, DB_PASSWORD);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
                } catch(PDOException $error) {

                    echo $error->getMessage();
                    exit();
                }

                return $connection;

                break;
        }

    }
}
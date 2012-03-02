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
 * Qubit Admin Parsing Controller Class
 * --------------------------------------------------------------------------------------------------------------------
 * Controller classes act as an interface between the template engine and the data models, performing basic logic and
 * template variable assignment.
 *
 * Controller classes are instantiated by a dispatcher class.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  database
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_database_empty
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->db = core_services_database::getConnection();
    }

    /**
     * Truncate Tables
     *
     * @return void
     */
    public function emptyTables()
    {
        $query = "TRUNCATE TABLE games";
        $this->db->exec($query);

        $query = "TRUNCATE TABLE frags";
        $this->db->exec($query);

        $query = "TRUNCATE TABLE players";
        $this->db->exec($query);

        $query = "TRUNCATE TABLE items";
        $this->db->exec($query);

        $query = "TRUNCATE TABLE rankings";
        $this->db->exec($query);
    }
}
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
 * Qubit Database Results Pager Class
 * --------------------------------------------------------------------------------------------------------------------
 *
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  database
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_database_pager
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->db = core_services_database::getConnection();
    }

    /**
     * Return a segment of an array
     *
     * @param array $results
     * @param int $pagenum
     * @return array
     */
    public function pageResults($results, $page)
    {
        $page--;
        //$page = $this->getPageNumber();
        $slice_start = $page * Q_DATA_PER_PAGE;
        $paged = array_slice($results, $slice_start, Q_DATA_PER_PAGE,  TRUE);

        return $paged;
    }

    /**
     * Get Current Page Number
     *
     * @return int
     */
    public  function getPageNumber()
    {
        $router = new core_services_router();
        $params = $router->getRoutes('action');
        if ($params == 'page') {
            $pagenum = $router->getParameters('0');

            if (!empty($pagenum)) {
                return $pagenum;
            }

        }
        return 1;
    }

}
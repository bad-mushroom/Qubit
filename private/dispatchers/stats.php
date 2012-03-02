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
 * Qubit Statistics Dispatcher Class
 * --------------------------------------------------------------------------------------------------------------------
 * Dispatchers act as a factory-like class by instantiating controller objects.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    dispatchers
 * @subpackage  stats
 * --------------------------------------------------------------------------------------------------------------------
 */
class dispatchers_stats extends core_services_dispatcher
{
    /**
	 * Class Constructor
     *
     * Checks current logged in session for access to admin onjects. Redirects to login form if user
     * does not have access.
     *
     * Put additional code before parent::__constructor() is called or it will be ignored.
	 */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Index Controller
     *
     * This method is called if a controller is requested in the URL.
     */
    public function index()
    {
        return new controllers_stats_games();
    }

    public function games()
    {
        return new controllers_stats_games();
    }

    public function players()
    {
        return new controllers_stats_players();
    }
    public function ladders()
    {
        return new controllers_stats_ladders();
    }
    public function rankings()
    {
        return new controllers_stats_rankings();
    }
    public function search()
    {
        return new controllers_stats_search();
    }
}
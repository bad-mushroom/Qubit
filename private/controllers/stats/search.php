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
 * Qubit Game Statistics Controller Class
 * --------------------------------------------------------------------------------------------------------------------
 * Controller classes act as an interface between the template engine and the data models, performing basic logic and
 * template variable assignment.
 *
 * Controller classes are instantiated by a dispatcher class.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    controllers
 * @subpackage  stats
 * --------------------------------------------------------------------------------------------------------------------
 */
class controllers_stats_search extends core_services_controller
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        // Template to use
        $this->template = new core_services_template(Q_TEMPLATE_DIR);

        // Get optional parameter
        $router = new core_services_router();
        $this->parameter = $router->getParameters(0);

        parent::__construct();
    }

    /**
     * Default Controller Method
     *
     * @return  void
     */
    public function index()
    {
        if (!empty($_POST['submit']) AND (!empty($_POST['search']))) {

            $searchModel = new models_search_results();

            // Defaults
            $this->template->assignVariable('page_title', 'Search');
            $this->template->assignVariable('table', NULL);

            switch ($_POST['context']) {

                case 'players':

                    $result = $searchModel->findPlayers($_POST['search']);

                    $this->template->assignVariable('players', $result);
                    $this->template->assignVariable('table', '_players/players.table.php');
                    $this->template->assignVariable('page_title', 'Player Search Results');
                    $this->template->assignVariable('page_description', '');

                    break;

                case 'game_mods':

                    $result = $searchModel->findGameMods($_POST['search']);

                    $this->template->assignVariable('games', $result);
                    $this->template->assignVariable('page_title', 'Game Mod Search Results');
                    $this->template->assignVariable('page_description', '');

                    break;

                default:
                    break;
            }
        }

        $this->template->getTemplateFile('_search/search.index.php');

    }

}

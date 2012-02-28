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
class controllers_stats_games extends core_services_controller
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
        // Template to use
        $this->template = new core_services_template('default');

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
        $scoresModel = new models_scores_games();
        $games = $scoresModel->getGames();

        // Template data
        $this->template->assignVariable('games', $games);
        $this->template->assignVariable('page_title', 'All Games');
        $this->template->assignVariable('page_description', '');
        $this->template->getTemplateFile('_games/games.table.php');
    }

    /**
     * View Method
     *
     * Displays a single entity. Requires that a parameter is passed in the URI.
     *
     * @return  void
     */
    protected function view()
    {
        if (!empty($this->parameter)) {

            $scoresModel = new models_scores_games();
            $games = $scoresModel->getGames($this->parameter);

            $playersModel = new models_scores_players();
            $players = $playersModel->getPlayersForGame($games[0]);

            // Template data
            $this->template->assignVariable('games', $games);
            $this->template->assignVariable('players', $players);
            $this->template->assignVariable('page_title', 'Game # ' . $games[0][0]);
            $this->template->assignVariable('page_description', '');
            $this->template->getTemplateFile('_games/games.detail.php');

        } else {
            $this->index();
        }
    }
}

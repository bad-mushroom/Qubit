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
 * Qubit Player Statistics Controller Class
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
class controllers_stats_players extends core_services_controller
{
    /**
     * Class Constructor
     */
    public function __construct()
    {
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
        $playersModel = new models_scores_players();
        $players = $playersModel->getPlayers();

        $this->template->assignVariable('players', $players);
        $this->template->assignVariable('page_title', 'All Players');
        $this->template->assignVariable('page_description', '');
        $this->template->getTemplateFile('_players/players.index.php');
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
            $playersModel = new models_scores_players();
            $player = $playersModel->getPlayers($this->parameter);

            $scoresFragsModel = new models_scores_frags();
            $scoresGamesModel = new models_scores_games();

            $player['total_frags'] = $scoresFragsModel->countPlayerFrags($player['name']);
            $player['total_deaths'] = $scoresFragsModel->countPlayerDeaths($player['name']);

            $games = $scoresGamesModel->getGamesForPlayer($player['name']);
            $player['total_games'] = count($games);

            $this->template->assignVariable('player', $player);
            $this->template->assignVariable('games', $games);
            $this->template->assignVariable('page_title', 'Profile: ' . $player['name']);
            $this->template->assignVariable('page_description', '');
            $this->template->getTemplateFile('_players/players.detail.php');
        } else {
            $this->index();
        }
    }
}
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
class controllers_stats_ladders extends core_services_controller
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
        $this->frags();
        return;
    }

    /**
     * View Method
     *
     * Displays a single entity. Requires that a parameter is passed in the URI.
     *
     * @return  void
     */
    protected function frags()
    {
        $playersModel = new models_scores_players();
        $players = $playersModel->getPlayers();

        $scoresFragsModel = new models_scores_frags();
        $ladder = array();
        $i = 0;
        foreach ($players as $player) {
            $ladder[$i]['total_frags'] = $scoresFragsModel->countPlayerFrags($player['name']);
            $ladder[$i]['name'] = $player['name'];
            $ladder[$i]['total_deaths'] = $scoresFragsModel->countPlayerDeaths($player['name']);
            $ladder[$i]['total_suicides'] = $scoresFragsModel->countPlayerSuicides($player['name']);
            $i++;
        }

        // Sort Column
        $frags = array();
        foreach ($ladder as $key => $row) {
            $frags[$key]  = $row['total_frags'];
        }

        array_multisort($frags, SORT_DESC, $ladder);

        $this->template->assignVariable('ladders', $ladder);
        $this->template->assignVariable('sort', 'frags');
        $this->template->assignVariable('page_title', 'Ladder Rankings: Most Frags');
        $this->template->assignVariable('page_description', '');
        $this->template->getTemplateFile('_ladders/ladders.index.php');
        return;
    }

    protected function deaths()
    {
        $playersModel = new models_scores_players();
        $players = $playersModel->getPlayers();

        $scoresFragsModel = new models_scores_frags();
        $ladder = array();
        $i = 0;
        foreach ($players as $player) {
            $ladder[$i]['total_frags'] = $scoresFragsModel->countPlayerFrags($player['name']);
            $ladder[$i]['name'] = $player['name'];
            $ladder[$i]['total_deaths'] = $scoresFragsModel->countPlayerDeaths($player['name']);
            $ladder[$i]['total_suicides'] = $scoresFragsModel->countPlayerSuicides($player['name']);
            $i++;
        }

        // Sort Column
        $deaths = array();
        foreach ($ladder as $key => $row) {
            $deaths[$key]  = $row['total_deaths'];
        }

        array_multisort($deaths, SORT_DESC, $ladder);

        $this->template->assignVariable('ladders', $ladder);
        $this->template->assignVariable('sort', 'deaths');
        $this->template->assignVariable('page_title', 'Ladder Rankings: Most Deaths');
        $this->template->assignVariable('page_description', '');
        $this->template->getTemplateFile('_ladders/ladders.index.php');
        return;
    }

    protected function suicides()
    {
        $playersModel = new models_scores_players();
        $players = $playersModel->getPlayers();

        $scoresFragsModel = new models_scores_frags();
        $ladder = array();
        $i = 0;
        foreach ($players as $player) {
            $ladder[$i]['total_frags'] = $scoresFragsModel->countPlayerFrags($player['name']);
            $ladder[$i]['name'] = $player['name'];
            $ladder[$i]['total_deaths'] = $scoresFragsModel->countPlayerDeaths($player['name']);
            $ladder[$i]['total_suicides'] = $scoresFragsModel->countPlayerSuicides($player['name']);
            $i++;
        }

        // Sort Column
        $suicides = array();
        foreach ($ladder as $key => $row) {
            $suicides[$key]  = $row['total_suicides'];
        }

        array_multisort($suicides, SORT_DESC, $ladder);

        $this->template->assignVariable('ladders', $ladder);
        $this->template->assignVariable('sort', 'suicides');
        $this->template->assignVariable('page_title', 'Ladder Rankings: Most Suicidal');
        $this->template->assignVariable('page_description', '');
        $this->template->getTemplateFile('_ladders/ladders.index.php');
        return;
    }
}

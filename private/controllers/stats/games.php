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
        $this->template = new core_services_template(Q_TEMPLATE_DIR);

        // Get optional parameter
        $this->router = new core_services_router();
        $this->parameter = $this->router->getParameters(0);

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
        $total_games = count($games);

        $pagerModel = new models_database_pager();
        $pagenumber = $pagerModel->getPageNumber();

        $results = $pagerModel->pageResults($games,$pagenumber);

        $pages = ceil($total_games / Q_DATA_PER_PAGE);

        // Template data
        $this->template->assignVariable('games', $results);
        $this->template->assignVariable('total_pages', $pages);
        $this->template->assignVariable('current_page', $pagenumber);
        $this->template->assignVariable('page_title', 'All Games');
        $this->template->assignVariable('page_description', '');
        $this->template->getTemplateFile('_games/games.index.php');
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
            $game = $scoresModel->getGames($this->parameter);

            $game['gamename_mod'] = $game['gamename'];
            if (class_exists('assets_mods_' . $game['gamename']) !== FALSE) {
                $class = 'assets_mods_'.$game['gamename'];
                $mod = new $class();
                $game['gametype'] = $mod->getGameType($game['gametype']);
                $game['gamename'] = $mod->getModName();
            }



            $playersModel = new models_scores_players();
            $players = $playersModel->getPlayersForGame($game['id']);

            $fragsModel = new models_scores_frags();

            foreach ($players as &$player) {
                $player = $fragsModel->addLadderes($player);
            }

            // Template data
            $this->template->assignVariable('games', $game);
            $this->template->assignVariable('players', $players);
            $this->template->assignVariable('page_title', 'Game # ' . $game['id']);
            $this->template->assignVariable('page_description', '');
            $this->template->getTemplateFile('_games/games.detail.php');

        } else {
            $this->index();
        }
    }
}

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
 * Qubit Game Statistics Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to calculate game statistics.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  scores
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_scores_games
{
    public function __construct()
    {
        $this->db = core_services_database::getConnection();

    }

    public function getGames($game_id = NULL)
    {

        $query = "SELECT * FROM games";

        if ($game_id !== NULL) {
            $query .= " WHERE id = :game_id";
        }

        $data = $this->db->prepare($query);

        if ($game_id !== NULL) {
            $data->bindParam(':game_id', $game_id, PDO::PARAM_INT);
        }

        $data->execute();
        $games = $data->fetchAll(PDO::FETCH_ASSOC);

        if ($game_id == NULL) {
            return $games;
        } else {
            return array_shift($games);
        }

    }

    public function getGamesForPlayer($player)
    {
        $query = "SELECT * FROM games_by_player WHERE name = :player";

        $data = $this->db->prepare($query);

            $data->bindParam(':player', $player, PDO::PARAM_STR);


        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

}
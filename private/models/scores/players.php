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
 * Qubit Player Statistics Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to calculate player statistics.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  scores
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_scores_players
{
    public function __construct()
    {
        $this->db = core_services_database::getConnection();

    }
    /**
     * Get Players by Game
     *
     * Returns an array of all players for a specific game.
     *
     * @param   int     $game_id    Game ID
     * @param   string  $order      Column Name
     * @return mixed
     */
    public function getPlayersForGame($game_id = NULL)
    {
        $query = "SELECT * FROM players";

        if ($game_id !== NULL) {
            $query .= " WHERE game_id = :game_id";
        }

        $data = $this->db->prepare($query);

        if ($game_id !== NULL) {
            $data->bindParam(':game_id', $game_id, PDO::PARAM_INT);
        }

        $data->execute();
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }



    /**
     *
     * @param int $player_name
     * @param string $order
     * @return mixed
     */
    public function getPlayers($player_name = NULL)
    {
        $query = "SELECT DISTINCT name, model, is_bot FROM players";

        if ($player_name !== NULL) {
            $query .= " WHERE name = :player_name";
        }

        $data = $this->db->prepare($query);

        if ($player_name !== NULL) {
            $data->bindParam(':player_name', $player_name, PDO::PARAM_INT);
        }

        $data->execute();
        $players = $data->fetchAll(PDO::FETCH_ASSOC);

        if ($player_name == NULL) {
            return $players;
        } else {
            return array_shift($players);
        }

    }

    /**
     * Remove Color Codes from Player Name
     *
     * @param string $name
     * @return string
     *
     * @todo Replace color codes with html markup
     */
    public static function formatName($name)
    {
        $colors = array('^0','^1','^2','^3','^4','^5','^6','^7');
        return str_replace($colors, '', trim($name));
    }


}
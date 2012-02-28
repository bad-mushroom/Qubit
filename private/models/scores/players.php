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
    public function getPlayersForGame($game_id, $order = NULL)
    {
        $query = "SELECT * FROM players WHERE game_id = " . $game_id[0];

        if ($order !== NULL) {
            $query .= " ORDER BY" . $order;
        }

        $this->db = core_services_database::getConnection();
        $result = $this->db->query($query);

        if ($result !== NULL) {
            $players = array();

            while ($row = $result->fetch_row()) {
                $players[] = $row;
            }
            $result->close();

            return $players;
        }
        return FALSE;
    }

    public function getPlayers($player_name = NULL, $order = NULL)
    {
      if ($player_name !== NULL) {
            $query = "SELECT * FROM players WHERE name = '" . $player_name ."' LIMIT 1";
        } else {
            $query = "SELECT * FROM players";
            if ($order !== NULL) {
                $query .= " ORDER BY" . $order;
            }
        }

        $this->db = core_services_database::getConnection();
        $result = $this->db->query($query);

        if ($result !== NULL) {
            $players = array();

            while ($row = $result->fetch_row()) {
                $players[] = $row;
            }
            $result->close();

            return $players;
        }
        return FALSE;
    }

    public function getOverAllFrags($player_name)
    {

    }
}
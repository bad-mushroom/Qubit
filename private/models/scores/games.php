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
    public function getGames($game_id = NULL, $order = NULL)
    {
        if ($game_id !== NULL) {
            $query = "SELECT * FROM games WHERE id = " . $game_id;
        } else {
            $query = "SELECT * FROM games";
        }

        if ($order !== NULL) {
            $query .= " ORDER BY" . $order;
        }

        $this->db = core_services_database::getConnection();
        $result = $this->db->query($query);

        if ($result !== NULL) {
            $games = array();

            while ($row = $result->fetch_row()) {
                $games[] = $row;
            }
            $result->close();

            return $games;
        }
        return FALSE;
    }


}
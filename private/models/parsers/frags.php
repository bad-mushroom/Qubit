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
 * Qubit Frags Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to parse frag information.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  parsers
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_parsers_frags extends models_parsers_games
{
    public function __construct($game_id)
    {
        $this->game_id = $game_id;
    }

    public function parseFrags($line)
    {
        $gi = explode(' ', $line);
        $info = array();

        $info['killer_id'] = $gi[2];
        $info['killed_id'] = $gi[3];
        $info['type'] = $gi[9];
        $info['time'] = $gi[0];

        $this->addFrags($info);
    }

    protected function addFrags($info)
    {

        $query = "
            INSERT INTO frags
                (game_id, time, player_killer_id, player_killed_id, type)
            VALUES (?, ?, ?, ?, ?)";

        $time = time();

        $this->db = core_services_database::getConnection();
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiiis', $this->game_id, $time, $info['killer_id'], $info['killed_id'], $info['type']);
        $stmt->execute();
        $stmt->close();

       return;
    }
}
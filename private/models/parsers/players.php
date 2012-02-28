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
 * Qubit Players Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to parse player information.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  parsers
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_parsers_players extends models_parsers_games
{
    public function __construct($game_id)
    {
        $this->game_id = $game_id;
    }

    public function parsePlayers($line)
    {
        $gi = explode('\\', $line);
        $first = explode(' ', $gi[0]);
        $player_id = $first[2];
        $info = array();
        $info['player_id'] = $player_id;
        $info['name'] = $gi[1];
        $info['model'] = $gi[5];

        if ($gi[18] == 'skill') {
            $info['bot'] = '1';
        } else {
            $info['bot'] = '0';
        }

        $this->addPlayers($info);
    }

    protected function addPlayers($info)
    {
        $query = "
            INSERT INTO players
                (game_id, player_id, name, model, is_bot)
            VALUES (?, ?, ?, ?, ?)";

        $time = time();

        $this->db = core_services_database::getConnection();
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iissi', $this->game_id, $info['player_id'], $info['name'], $info['model'], $info['bot']);
        $stmt->execute();
        $stmt->close();

       return;
    }

}
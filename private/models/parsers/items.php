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
 * Qubit Items Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to parse item information.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  parsers
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_parsers_items extends models_parsers_games
{
    public function __construct($game_id)
    {
        $this->game_id = $game_id;
    }

    public function parseItems($line)
    {
        $items = explode(' ', $line);
        $info = array();

        $info['player_id'] = $items[2];
        $info['item'] = $items[3];
        $info['time'] = $items[0];

       $this->addItems($info);
    }

    protected function addItems($info)
    {

        $query = "
            INSERT INTO items
                (game_id, time, player_id, item)
            VALUES (?, ?, ?, ?)";

        $time = time();

        $this->db = core_services_database::getConnection();
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiis', $this->game_id, $time, $info['player_id'], $info['item']);
        $stmt->execute();
        $stmt->close();

       return;
    }
}
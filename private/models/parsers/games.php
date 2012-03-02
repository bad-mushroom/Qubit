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
 * Qubit Games Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to parse complete games from log file.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  parsers
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_parsers_games
{
    public function __construct()
    {
        set_time_limit(Q_EXECUTION_TIME);
        $this->db = core_services_database::getConnection();
    }

    public function getGames($contents)
    {
        $starts = array();
        foreach ($contents as $line => $data) {
            if (strpos($data, 'InitGame:')) {
                $starts[] = $line;
            }
            if (strpos($data, 'ShutdownGame:')) {
                $ends[] = $line + 1;
            }
        }
        $total_starts = count($starts);
        $total_ends = count($ends);

        $games = array();
        if ($total_starts == $total_ends) {
            for ($i = 0; $i != $total_starts; $i++) {
                $games[] = $starts[$i] . ',' . $ends[$i];
            }
            return $games;
        }
        return FALSE;
    }

    public function parseGame($games, $content)
    {
        foreach ($games as $game) {
            $info = explode(',', $game);
            $this->parseGameData($content,  $info[0], $info[1]);
        }
        return;
    }

    protected function parseGameData($content, $start, $end)
    {
        for ($i = $start; $i < $end; $i++) {
            $line = trim($content[$i]);

            $regex = '/[0-9]+:[0-9]+ ([^:]+)/';
            $entity = array(); preg_match($regex, $line, $entity);

            if ($entity[1] == 'InitGame') {
                $init = new models_parsers_info();
                $this->game_id = $init->parseInfo($line);
            }

            switch ($entity[1]) {
                case 'Kill':
                    $kill = new models_parsers_frags($this->game_id);
                    $kill->parseFrags($line);
                    break;

                case 'Item':
                    if (Q_TRACK_ITEMS !== FALSE) {
                        $item = new models_parsers_items($this->game_id);
                        $item->parseItems($line);
                    }
                    break;

                case 'ClientUserinfoChanged':
                    $player = new models_parsers_players($this->game_id);
                    $player->parsePlayers($line);
                    break;

                case 'say':
                    if (Q_TRACK_CHATS !== FALSE) {
                        $chat = new models_parsers_chat($this->game_id);
                        $chat->parseChat($line);
                    }
                    break;

                default:
                    break;
            }

        }
    }

}
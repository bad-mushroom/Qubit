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
 * Qubit Games Info Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to parse game information.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  parsers
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_parsers_info extends models_parsers_games
{
    public function __construct()
    {
        parent::__construct();
    }

    public function parseInfo($line)
    {
        $gi = explode('\\', $line);
        array_shift($gi);
        $chunk = array_chunk($gi, 2);

        $info = array();
        foreach ($chunk as $keys => $value) {
            $info[$value[0]] = $value[1];
        }

        return $this->addInfo($info);
    }

    protected function addInfo($info)
    {
        $query = "
            INSERT INTO games
                (parse_time, hostname, fraglimit, timelimit, mapname, version, gametype, gamename)
            VALUES (:parse_time, :hostname, :fraglimit, :timelimit, :mapname, :version, :gametype, :gamename)";

        $parse_time = time();
        $data = $this->db->prepare($query);
        $data->bindParam(':parse_time', $parse_time);
        $data->bindParam(':hostname', $info['sv_hostname']);
        $data->bindParam(':fraglimit', $info['fraglimit']);
        $data->bindParam(':timelimit', $info['timelimit']);
        $data->bindParam(':mapname', $info['mapname']);
        $data->bindParam(':version', $info['version']);
        $data->bindParam(':gametype', $info['g_gametype']);
        $data->bindParam(':gamename', $info['gamename']);
        $data->execute();
        return $this->db->lastInsertId();
    }
}
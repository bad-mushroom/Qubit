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
 * Qubit Frag Statistics Class
 * --------------------------------------------------------------------------------------------------------------------
 * Class to calculate frag statistics.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  scores
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_scores_frags
{
    /**
     * 
     */
    public function __construct()
    {
        $this->db = core_services_database::getConnection();
    }

    /**
     *
     * @param type $player
     * @param type $game_id
     * @return type 
     */
    public function countPlayerFrags($player, $game_id = NULL)
    {
        $query = "SELECT COUNT(id) FROM frags WHERE fragger = :player";

        if ($game_id != NULL) {
            $query .= " AND game_id = :game_id";
        }

        $data = $this->db->prepare($query);
        $data->bindParam(':player', $player, PDO::PARAM_STR);

        if ($game_id != NULL) {
            $data->bindParam(':game_id', $game_id, PDO::PARAM_INT);
        }

        $data->execute();
        return $data->fetchColumn();

    }

    /**
     *
     * @param type $player
     * @param type $game_id
     * @return type 
     */
    public function countPlayerDeaths($player, $game_id = NULL)
    {
        $query = "SELECT COUNT(id) FROM frags WHERE fragged = :player";

        if ($game_id != NULL) {
            $query .= " AND game_id = :game_id";
        }

        $data = $this->db->prepare($query);
        $data->bindParam(':player', $player, PDO::PARAM_STR);

        if ($game_id != NULL) {
            $data->bindParam(':game_id', $game_id, PDO::PARAM_INT);
        }

        $data->execute();
        return $data->fetchColumn();
    }

    /**
     *
     * @param type $player
     * @param type $game_id
     * @return type 
     */
    public function countPlayerSuicides($player, $game_id = NULL)
    {
        $query = "SELECT COUNT(id) FROM frags WHERE fragged = :player AND fragger = '<world>'";

        if ($game_id != NULL) {
            $query .= " AND game_id = :game_id";
        }

        $data = $this->db->prepare($query);
        $data->bindParam(':player', $player, PDO::PARAM_STR);

        if ($game_id != NULL) {
            $data->bindParam(':game_id', $game_id, PDO::PARAM_INT);
        }

        $data->execute();
        return $data->fetchColumn();
    }

    /**
     *
     * @param type $player
     * @return type 
     */
    public function addLadderes($player)
    {
        $player['total_frags'] = $this->countPlayerFrags($player['name'], $player['game_id']);
        $player['total_deaths'] = $this->countPlayerDeaths($player['name'], $player['game_id']);
        $player['total_suicides'] = $this->countPlayerSuicides($player['name'], $player['game_id']);
        return $player;
    }

}
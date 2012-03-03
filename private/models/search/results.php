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
 * @subpackage  search
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_search_results
{
    public function __construct()
    {
        $this->db = core_services_database::getConnection();
    }

    public function findPlayers($search)
    {
        $query = "SELECT * FROM players WHERE name LIKE :search";

        $str = "%$search%";
        $data = $this->db->prepare($query);
        $data->bindParam(':search', $str);
        $data->execute();

        return $data->fetchAll(PDO::FETCH_ASSOC);

    }

    public function findGameMods($search)
    {
        $query = "SELECT * FROM games WHERE gamename LIKE :search";

        $str = "%$search%";
        $data = $this->db->prepare($query);
        $data->bindParam(':search', $str);
        $data->execute();

        return $data->fetchAll(PDO::FETCH_ASSOC);

    }
}

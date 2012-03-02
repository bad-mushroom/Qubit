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
 * Qubit Log File Class
 * --------------------------------------------------------------------------------------------------------------------
 * Configuration class for game mod Urban Terror.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    assets
 * @subpackage  mods
 * --------------------------------------------------------------------------------------------------------------------
 */
class assets_mods_q3ut4 implements models_interfaces_imod
{
    /**
     * Get Mod Name
     *
     * @return string
     */
    public function getModName()
    {
        return 'Urban Terror';
    }

    /**
     * Get Game Type
     *
     * Returns the game type based on it's ID
     *
     * @param int $gametype
     * @return string
     */
    public function getGameType($gametype)
    {
        $mod_game_types = array(
            '0' => 'Free For All',
            '3' => 'Team Deathmatch',
            '4' => 'Team Surivor',
            '5' => 'Follow the Leader',
            '6' => 'Capture and Hold',
            '7' => 'Capture The Flag',
            '8' => 'Bombmode');

        if (array_key_exists($gametype, $mod_game_types)) {
            return $mod_game_types[$gametype];
        }
    }

}
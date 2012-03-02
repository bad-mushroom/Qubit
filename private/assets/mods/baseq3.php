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
 * Configuration class for game mod Quake III Arena.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    assets
 * @subpackage  mods
 * --------------------------------------------------------------------------------------------------------------------
 */
class assets_mods_baseq3 implements models_interfaces_imod
{
    public function getModName()
    {
        return 'Quake III Arena';
    }

    public function getGameType($gametype)
    {
        $mod_game_types = array(
            '0'         => 'Free For All',
            '1'         => 'Tournament 1-on-1',
            '2'         => 'Single Player',
            '3'         => 'Team Deathmatch',
            '4'         => 'Capture the Flag');

        if (array_key_exists($gametype, $mod_game_types)) {
            return $mod_game_types[$gametype];
        }
    }

}
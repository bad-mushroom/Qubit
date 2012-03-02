<?php

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

/*

define('GAME_MOD_NAME', 'Quake III Arena');

$mod_game_types = array(
    '0'         => 'Free For All',
    '1'         => 'Tournament 1-on-1',
    '2'         => 'Single Player',
    '3'         => 'Team Deathmatch',
    '4'         => 'Capture the Flag');

$mod_weapon_types = array(
    'MOD_TRIGGER_HURT'      => 'Trigger Hurt',
    'MOD_ROCKET'            => 'Rocket Launcher',
    'MOD_MACHINEGUN'        => 'Machine Gun',
    'MOD_ROCKET_SPLASH'     => 'Rocket Splash',
    'MOD_SHOTGUN'           => 'Shotgun',
    'MOD_FALLING'           => 'Fall',
    'MOD_RAILGUN'           => 'Rail Gun',
    'MOD_PLASMA'            => 'Plasma Gun',
    'MOD_LAVA'              => 'Lava',
    'MOD_CRUSH'             => 'Crush',
    'MOD_BFG_SPLASH'        => 'B.F.G. Splash',
    'MOD_BFG'               => 'B.F.G.',
    'MOD_GRENADE'           => 'Grenade',
    'MOD_GRENADE_SPLASH'    => 'Grenade Splash',
    'MOD_PLASMA_SPLASH'     => 'Plasma Splash',
    'MOD_WATER'             => 'Water',
    'MOD_LIGHTNING'         => 'Lightning Gun',
    'MOD_SLIME'             => 'Slime',
    'MOD_GAUNTLET'          => 'Gauntlet',
    'MOD_SUICIDE'           => 'Suicide',
    'MOD_TELEFRAG'          => 'Telefrag');

$mod_item_types = array(
    'ammo_shells' => 'Shotgun Shells',
    'weapon_shotgun' => '',
    'ammo_bullets' => '',
    'item_armor_combat' => '',
    'item_health_large' => '',
    'item_health_mega' => '',
    'weapon_rocketlauncher' => '',
    'weapon_railgun' => '',
    'team_CTF_redflag' => '',
    'team_CTF_blueflag' => '',
    'ammo_rockets' => '',
    'ammo_cells' => '',
    'weapon_plasmagun' => '',
    'item_armor_body' => '',
    'item_armor_shard' => '',
    'ammo_grenades' => '',
    'holdable_medkit' => '',
    'weapon_grenadelauncher' => '',
    'item_health_small' => '',
    'item_health' => '',
    'ammo_slugs' => '',
    'item_invis' => '',
    'item_regen' => '',
    'item_quad' => '',
    'weapon_bfg' => '',
    'ammo_lightning' => '',
    'item_haste' => '',
    'item_flight' => '',
    'holdable_teleporter' => '',
    'ammo_bfg' => '',
    'ammo_bfg' => '',
    'item_enviro' => '',
    '' => '',
    '' => '',
    '' => '',
    '' => '',

);
 * */

<?php

abstract class assets_mods_mods
{
    public static function getMapImage($gamename, $mapname)
    {
        $file = Q_PRIVATE_DIR . DS . 'assets' . DS . 'mods' . DS . $gamename . DS . 'maps' . DS . $mapname . '.png';

        if (file_exists($file)) {



        }

    }
}

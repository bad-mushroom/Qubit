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
 * Class to interface with log files.
 * --------------------------------------------------------------------------------------------------------------------
 * @package     Qubit
 * @category    models
 * @subpackage  logs
 * --------------------------------------------------------------------------------------------------------------------
 */
class models_logs_log
{
    /**
     *
     */
    public function __construct()
    {
        $this->path = Q_PRIVATE_DIR . DS . 'assets' . DS . 'logs';
        $this->archive_path = Q_PRIVATE_DIR . DS . 'assets' . DS . 'archives';
    }

    /**
     * Get Log Files from Logs Directory
     *
     * Adds each filename in the logs directory to an array.
     *
     * @return mixed    FALSE if no logs are found or an array of filenames
     */
    public function getLogs()
    {
        $dh = opendir($this->path);
        if ($dh !== FALSE) {
            $logs = array();
    		while (FALSE !== ($file = readdir($dh))) {
    			if ($file != '.' && $file != '..') {
                    $logs[] = $file;
                }
    		}
            closedir($dh);
            return $logs;
        }
        return FALSE;
    }

    /**
     * Archive Log Files
     *
     * Move parsed log files to the archive directory.
     *
     * @param   string    $log    Log filename
     * @return  boolean
     */
    public function archiveLog($log)
    {
        $archive = time() . '.log';
        if (copy($this->path . DS . $log, $this->archive_path . DS . $archive) !== FALSE) {
            unlink($this->path . DS . $log);
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Read Log File
     *
     * Read contents of log file into an array.
     *
     * @param   string  $log    Log filename
     * @return  mixed   FALSE on error or $file (array)
     */
    public function readLog($log)
    {
        $file = file($this->path . DS . $log);

        if ($file !== FALSE) {
            return $file;
        }
        return FALSE;

    }
    
}

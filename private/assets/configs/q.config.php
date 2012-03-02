<?php

/**
 * ------------------------------------------------------------------------------------------------
 *  Template Directory
 * ------------------------------------------------------------------------------------------------
 *  Values: name of directory under public_html/templates
 * ------------------------------------------------------------------------------------------------
 *  The template directory contains the UI (css, images, etc).
 * ------------------------------------------------------------------------------------------------
 */

define('Q_TEMPLATE_DIR',    'default');

/**
 * ------------------------------------------------------------------------------------------------
 *  Track Item Pickups
 * ------------------------------------------------------------------------------------------------
 *  Values: TRUE or FALSE
 * ------------------------------------------------------------------------------------------------
 * It's HIGHLY recommended that you do NOT enable this as item pickups can take up a huge amount
 * of log space. This is turn will potentially add many minutes to your parsing, eat up your
 * reqources, and potentially cause the Earth to stop spinning. But... it's your server, do as you
 * wish - you've been warned.
 * ------------------------------------------------------------------------------------------------
 */

define('Q_TRACK_ITEMS',    FALSE);

/**
 * ------------------------------------------------------------------------------------------------
 *  Track In Game Chats
 * ------------------------------------------------------------------------------------------------
 *  Values: TRUE or FALSE
 * ------------------------------------------------------------------------------------------------
 * Currently only tracks public chats, not team, attacker, target, etc...
 * ------------------------------------------------------------------------------------------------
 */

define('Q_TRACK_CHATS',    FALSE);

/**
 * ------------------------------------------------------------------------------------------------
 *  Script Execution Time
 * ------------------------------------------------------------------------------------------------
 *  Values: Miliseconds - 300 Miliseconds is 5 minutes
 * ------------------------------------------------------------------------------------------------
 * PHP (by default) has a 30 second limit before it will error out.  Setting this will override the
 * default setting on most servers.
 * ------------------------------------------------------------------------------------------------
 */

define('Q_EXECUTION_TIME',     300);

/**
 * ------------------------------------------------------------------------------------------------
 *  Append Stats Data
 * ------------------------------------------------------------------------------------------------
 *  Values: TRUE or FALSE
 * ------------------------------------------------------------------------------------------------
 * Setting value to FALSE will cause the stats to be purged from the database before each import.
 * TRUE will not purge the data and add to the existing stats instead.
 * ------------------------------------------------------------------------------------------------
 */

define('Q_APPEND_DATA',    FALSE);
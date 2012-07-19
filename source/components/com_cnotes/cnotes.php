<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 12.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');


$task = $_GET['task'];


switch($task) {
    case 'new':
        newNote();
        break;
}


function newNote() {
    require_once JPATH_ROOT .'/configuration.php';
    $config = new JConfig;
    $username = $config->user;
    $password = $config->password;;
    $hostname = $config->host;
    $mysqli = new mysqli($hostname, $username, $password, $config->db)
        or die("Unable to connect to MySQL");

    $user = JFactory::getUser();
    $query = 'INSERT INTO jos_cnotes_notes (title, note, created_by) VALUES'
                    . '("'.$_POST['title'].'","'.$_POST['note'].'",' . $user->id .')';

    $result = $mysqli->multi_query($query);

    if($result) {
        echo json_encode(array('status' => 'OK'));
    } else {
        echo json_encode(array('status' => 'FAILURE'));
    }

    exit();
}
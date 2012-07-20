<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 12.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');



JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables/');


$jlang =& JFactory::getLanguage();

$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, null, true);
$jlang->load('com_cnotes', JPATH_SITE, 'en-GB', true);
$jlang->load('com_cnotes', JPATH_SITE, $jlang->getDefault(), true);
$jlang->load('com_cnotes', JPATH_SITE, null, true);


jimport('joomla.application.component.controller');

$controller = JController::getInstance('cnotes');

//var_dump(JRequest::getCmd('task'));
//die();
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();



return;

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
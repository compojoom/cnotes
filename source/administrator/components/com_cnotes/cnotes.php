<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 12.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

echo 'cnotes';

// Include dependancies
jimport('joomla.application.component.controller');

$controller = JController::getInstance('Cnotes');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();




return;


$task = 'list';
if(isset($_GET['task'])) {
    $task = $_GET['task'];
}


switch($task) {
    case 'save':
        saveNote();
        break;
    case 'edit':
        edit();
        break;
    case 'list':
    default:
        showList();
        break;
}

function showList() {
    require_once JPATH_ROOT .'/configuration.php';
    $config = new JConfig;
    $username = $config->user;
    $password = $config->password;;
    $hostname = $config->host;
    $dbh = mysql_connect($hostname, $username, $password)
        or die("Unable to connect to MySQL");

    $selected = mysql_select_db($config->db,$dbh)
        or die("Could not select first_test");

    $result = mysql_query("SELECT * FROM jos_cnotes_notes");

    echo '<table name="admintable">';
    while($row = mysql_fetch_array($result))
    {
        echo '<tr>';
        echo '<td><a href="index.php?option=com_cnotes&task=edit&id='.$row['id'].'">'.$row['title'] .'</a>' . '</td><td>' . $row['note'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';


    mysql_close($dbh);
}


function edit() {
    require_once JPATH_ROOT .'/configuration.php';
    $config = new JConfig;
    $username = $config->user;
    $password = $config->password;;
    $hostname = $config->host;
    $mysqli = new mysqli($hostname, $username, $password, $config->db)
        or die("Unable to connect to MySQL");

    $query = "SELECT * FROM jos_cnotes_notes WHERE id = " .$_GET['id'];
    $result = $mysqli->multi_query($query);

    echo '<form action="index.php?option=com_cnotes&task=save" method="POST">';

    if ($result = $mysqli->store_result()) {
        while ($row = $result->fetch_row()) {
            echo 'id: ' . $row[0] . '<br />';
            echo 'title: <input name="title" type="text" value="'.$row[1].'" /> <br />';
            echo 'note: <textarea name="note" rows="5" cols="5">'.$row[2].'</textarea> <br />';
            echo '<input name="id" type="hidden" value="'.$row[0].'" />';
            echo '<button>save</button>';
        }
        $result->free();
    }

    echo '</form>';


    $mysqli->close();
}


function saveNote() {
    require_once JPATH_ROOT .'/configuration.php';
    $config = new JConfig;
    $username = $config->user;
    $password = $config->password;;
    $hostname = $config->host;
    $mysqli = new mysqli($hostname, $username, $password, $config->db)
        or die("Unable to connect to MySQL");

    $query = 'UPDATE jos_cnotes_notes SET title = "' . $_POST['title'] .'",'
                    . ' note = "' . $_POST['note'] .'"'
                    . ' WHERE id = ' . $_POST['id'];

    $result = $mysqli->multi_query($query);

    if($result) {
        header('Location: index.php?option=com_cnotes');
    }



    $mysqli->close();
}
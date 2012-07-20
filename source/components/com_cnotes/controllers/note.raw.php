<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 20.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class cnotesControllerNote extends JController {


    public function add() {

        $data = JFactory::getApplication()->input;

        $table = JTable::getInstance('notes', 'cnotesTable');
        $input = new JInput;

// Get the $_POST superglobal.
//        $post = $input->post;

//        var_dump($post);
//        var_dump($data->get('post'));
//        var_dump($data->getArray(array('title' => 'string', 'note' => 'text')));
        $form = ($data->get('jform', array(), 'array'));

//        var_dump($form);
//        die();
        if (!$table->bind($form)) {
            echo "<script> alert('" . $table->getError() . "'); window.history.go (-1); </script>\n";
            exit();
        }

        if(!$table->store()) {
            echo 'some errror';
        };


//        var_dump($table);
//        var_dump($data);

        echo json_encode(array('ok'));
        jexit();
    }
}
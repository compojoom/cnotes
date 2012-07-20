<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 20.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

class cnotesControllerNote extends JController {

    public function add() {

        $row = JTable::getInstance('notes', 'cnotesTable');
        $input = JFactory::getApplication()->input;

        $data = $input->get('jform', '', 'array');


        if(!$row->bind($data)) {
            echo 'bind unsuccessful';
        };

        if(!$row->store()) {
            echo 'something else';
        }

        $response = array('status' => 'OK');

        echo json_encode($response);

        jexit();

//        var_dump();
//        var_dump($row);
//        die('die');
    }
}
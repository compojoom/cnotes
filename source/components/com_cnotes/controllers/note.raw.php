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

    /**
     * TODO: make better error handling when the token has expired
     * echo json
     */
    public function add() {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $user = JFactory::getUser();
        $status = 'OK';

        // unregistered user - we don't allow that!
        if(!$user->get('id')) {
            $response = array('status' => 'FAILURE', 'message' => JText::_('COM_CNOTES_YOU_NEED_TO_BE_REGISTERED'));

            echo json_encode($response);
        }

        $row = JTable::getInstance('notes', 'cnotesTable');

        $input = JFactory::getApplication()->input;

        $data = $input->get('jform', '', 'array');
        $data['created_by'] = $user->get('id');
        $data['created_on'] = JFactory::getDate()->toSql();

        if(!$row->bind($data)) {
            $status = 'FAILURE';
        };

        if(!$row->store()) {
            $status = 'FAILURE';
        }

        if($status == 'OK') {
            $response = array(
                'status' => $status,
                'note' => array(
                    'edit' => JRoute::_('index.php?option=com_cnotes&task=note.edit&id='.$row->id),
                    'title' => $row->title,
                    'note' => $row->note
                )
            );
        } else {
            $response = array('status' => 'FAILURE', 'message' => JText::_('COM_CNOTES_SOMETHING_WENT_WRONG'));
        }


        echo json_encode($response);

        jexit();
    }
}
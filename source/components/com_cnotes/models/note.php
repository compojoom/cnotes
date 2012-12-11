<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 03.08.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modeladmin');

class cnotesModelNote extends JModelAdmin {

    public function getTable($name = 'Notes', $prefix = 'cnotesTable', $options = array()) {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getForm($data = array(), $load = true) {

        $form = $this->loadForm('com_cnotes.note', 'note', array('control' => 'jform', 'load_data' => $load));

        return $form;
    }

	protected function canDelete($record)
	{
		$recordId	= (int) isset($record->id) ? $record->id : 0;
		$user		= JFactory::getUser();
		$userId		= $user->get('id');

		// check for delete.own.
		// First test if the permission is available.
		if ($user->authorise('core.delete.own', 'com_cnotes')) {
			// Now test the owner is the user.
			$ownerId	= (int) isset($record->created_by) ? $record->created_by : 0;
			if (empty($ownerId) && $recordId) {

				if (empty($record)) {
					return false;
				}

				$ownerId = $record->created_by;
			}

			// If the owner matches 'me' then do the test.
			if ($ownerId == $userId) {
				return true;
			}
		}


	}

    public function loadFormData() {
        $data = JFactory::getApplication()->getUserState('com_cnotes.edit.note.data', array());

        if(empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }
}
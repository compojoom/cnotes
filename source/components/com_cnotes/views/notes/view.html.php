<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.viewlegacy');

class cnotesViewNotes extends JViewLegacy {

    public function display($tpl = null) {
        $user = JFactory::getUser();

        if($user->get('id')) {
            $this->state = $this->get('state');
            $this->items = $this->get('Items');
            $this->pagination = $this->get('Pagination');
			// check if user has delete & edit permissions
			$this->canEdit = JFactory::getUser()->authorise('core.edit.own', 'com_cnotes');
			$this->canDelete = JFactory::getUser()->authorise('core.delete.own', 'com_cnotes');
        } else {
            $tpl = 'error';
        }

        parent::display($tpl);
    }

}
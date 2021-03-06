<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class cnotesViewNotes extends JView {

    public function display($tpl = null) {
        $this->state = $this->get('state');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        $this->addToolbar();
        parent::display($tpl);
    }

    public function addToolbar() {
        JToolBarHelper::title(JText::sprintf('COM_CNOTES_NOTES', 'something'));

        JToolBarHelper::editList('note.edit');
    }
}
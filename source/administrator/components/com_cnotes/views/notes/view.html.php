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
class CnotesViewNotes extends JView
{

    public function display()
    {
        $this->pagination	= $this->get('Pagination');
        $this->state		= $this->get('State');
        $this->items = $this->get('Items');

        $this->addToolbar();
        parent::display();
    }

    protected function addToolbar()
    {
        JToolBarHelper::title('Notes');

        JToolBarHelper::editList('note.edit');
    }

}
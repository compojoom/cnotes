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
class CnotesViewNote extends JView
{

    public function display()
    {

        $this->item		= $this->get('Item');
        $this->form		= $this->get('Form');
//        $this->items = $this->get('Items');

        var_dump($this->item);
        $this->addToolbar();
        parent::display();
    }

    protected function addToolbar()
    {
        JToolBarHelper::title('Notes');

        JToolBarHelper::save('note.save');
        JToolBarHelper::cancel('note.cancel');
    }

}
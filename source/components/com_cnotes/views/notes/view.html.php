<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 20.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class cnotesViewNotes extends JView {

    public function display() {
        var_dump($this->get('items'));
        $this->state = $this->get('State');
        $this->items = $this->get('items');
        $this->pagination = $this->get('pagination');

        parent::display();
    }
}
<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 03.08.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');


jimport('joomla.application.component.viewlegacy');

class cnotesViewNote extends JViewLegacy {

    public function display() {
        $this->form = $this->get('form');
        $this->item	= $this->get('Item');

        parent::display();
    }

}
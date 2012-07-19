<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class cnotesModelNotes extends JModelList {

    protected function getListQuery() {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('*')->from('#__cnotes_notes');


        return $query;
    }
}
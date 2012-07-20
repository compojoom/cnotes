<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

class modCnotesHelper {

    public function getList() {
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);

        $query->select('*')->from('#__cnotes_notes')
            ->where('created_by = ' . $db->quote($user->id));

        $db->setQuery($query);

        return $db->loadObjectList();
    }
}
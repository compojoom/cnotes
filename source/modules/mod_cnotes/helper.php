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

    /**
     * Load notes for the specific page from the logged in user
     * @return mixed
     */
    public function getList() {
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $url = JFactory::getUri();
        $query = $db->getQuery(true);

        $query->select('*')->from('#__cnotes_notes')
            ->where('created_by = ' . $db->quote($user->id))
            ->where('url = ' . $db->quote($url->toString(array('path'))));

        $db->setQuery($query);

        return $db->loadObjectList();
    }
}
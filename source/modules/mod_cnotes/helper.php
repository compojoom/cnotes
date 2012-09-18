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
    public static function getList() {
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);

        $query->select('*')->from('#__cnotes_notes')
            ->where('created_by = ' . $db->quote($user->id))
            ->where('url = ' . $db->quote(self::getUrl()));

        // let us limit the results up to 100 for now
        $db->setQuery($query, 0, 100);

        return $db->loadObjectList();
    }

    /**
     * Returns an url with path & query if we don't have sef on and only path if we have sef on.
     * @return string
     */
    public function getUrl() {
        $url = JFactory::getURI();
        if(JFactory::getConfig()->get('sef')) {
            $noteUrl = $url->toString(array('path'));
        } else {
            $noteUrl = $url->toString(array('path','query'));
        }

        return $noteUrl;
    }
}
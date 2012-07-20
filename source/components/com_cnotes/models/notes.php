<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 20.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

//require_once JPATH_COMPONENT_ADMINISTRATOR . '/models/notes.php';

jimport('joomla.application.component.model');

class cnotesModelNotes extends JModel {

    public function getItems() {
        $db  = JFactory::getDbo();
        $user = JFactory::getUser();

        $query = $db->getQuery(true);

        $query->select('*')->from('#__cnotes_notes')->where('created_by = ' . $db->quote($user->id));

        $search = $this->getState('filter.search');
//var_dump($search);
//        die();
        if(!empty($search)) {
            $search = $db->quote('%'.$db->escape($search, true) . '%');
            $query->where('n.title LIKE ' . $search);
        }
        $orderCol = $this->state->get('list.ordering');
        $orderDir = $this->state->get('list.direction');

        $query->order($orderCol. ' ' . $orderDir);

        $db->setQuery($query, $this->getStart(), $this->getState('list.limit'));

        return $db->loadObjectList();
    }

    /**
     * Method to get a JPagination object for the data set.
     *
     * @return  JPagination  A JPagination object for the data set.
     *
     * @since   11.1
     */
    public function getPagination()
    {
        // Get a storage key.
//        $store = $this->getStoreId('getPagination');
//
//        // Try to load the data from internal storage.
//        if (isset($this->cache[$store]))
//        {
//            return $this->cache[$store];
//        }

        // Create the pagination object.
        jimport('joomla.html.pagination');
        $limit = (int) $this->getState('list.limit') - (int) $this->getState('list.links');
        $page = new JPagination($this->getTotal(), $this->getStart(), $limit);

        // Add the object to the internal cache.
//        $this->cache[$store] = $page;

        return $page;
    }

    public function getTotal()
    {
        // Get a storage key.
//        $store = $this->getStoreId('getTotal');
//
//        // Try to load the data from internal storage.
//        if (isset($this->cache[$store]))
//        {
//            return $this->cache[$store];
//        }

        // Load the total.
        $query = $this->getItems();
        $total = (int) $this->_getListCount($query);

        // Check for a database error.
        if ($this->_db->getErrorNum())
        {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // Add the total to the internal cache.
//        $this->cache[$store] = $total;

        return $total;
    }

    public function getStart()
    {
//        $store = $this->getStoreId('getstart');
//
//        // Try to load the data from internal storage.
//        if (isset($this->cache[$store]))
//        {
//            return $this->cache[$store];
//        }

        $start = $this->getState('list.start');
        $limit = $this->getState('list.limit');
        $total = $this->getTotal();
        if ($start > $total - $limit)
        {
            $start = max(0, (int) (ceil($total / $limit) - 1) * $limit);
        }

        // Add the total to the internal cache.
//        $this->cache[$store] = $start;

        return $start;
    }

    protected function populateState($ordering = 'title', $direction = null)
    {
        // If the context is set, assume that stateful lists are used.
//        if ($this->context)
//        {
            $app = JFactory::getApplication();

            $value = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'), 'uint');
            $limit = $value;
            $this->setState('list.limit', $limit);

            $value = $app->getUserStateFromRequest('com_cnotes.limitstart', 'limitstart', 0);
            $limitstart = ($limit != 0 ? (floor($value / $limit) * $limit) : 0);
            $this->setState('list.start', $limitstart);

//             Check if the ordering field is in the white list, otherwise use the incoming value.
            $value = $app->getUserStateFromRequest( 'com_cnotes.ordercol', 'filter_order', $ordering);
//            if (!in_array($value, $this->filter_fields))
//            {
                $value = $ordering;
                $app->setUserState( 'com_cnotes.ordercol', $value);
//            }
            $this->setState('list.ordering', $value);

            // Check if the ordering direction is valid, otherwise use the incoming value.
            $value = $app->getUserStateFromRequest('com_cnotes.orderdirn', 'filter_order_Dir', $direction);
            if (!in_array(strtoupper($value), array('ASC', 'DESC', '')))
            {
                $value = $direction;
                $app->setUserState( 'com_cnotes.orderdirn', $value);
            }
            $this->setState('list.direction', $value);
//        }
//        else
//        {
//            $this->setState('list.start', 0);
//            $this->state->set('list.limit', 0);
//        }
    }
}
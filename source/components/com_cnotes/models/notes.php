<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 03.08.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class cnotesModelNotes extends JModelList {

    protected function populateState($ordering = null, $direction = null) {

        $search = $this->getUserStateFromRequest('com_cnotes.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        parent::populateState('n.title', 'asc');
    }

    protected function getListQuery() {
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);

        if(!$user->get('id')) {
            return $query;
        }

        $query->select('*')->from('#__cnotes_notes AS n')
            ->where('created_by = ' . $db->quote($user->get('id')));

        $orderCol = $this->state->get('list.ordering');
        $orderDir = $this->state->get('list.direction');

        $search = $this->getState('filter.search');

        if(!empty($search)) {
            $search = $db->quote('%'.$db->escape($search, true) . '%');
            $query->where('n.title LIKE ' . $search . ' OR note LIKE ' . $search);
        }

        $query->order($orderCol. ' ' . $orderDir);

        return $query;
    }
}
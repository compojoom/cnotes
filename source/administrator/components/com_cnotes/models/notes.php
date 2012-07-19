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

    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'n.id',
                'title', 'n.title',
            );
        }

        parent::__construct($config);
    }


    protected function populateState($ordering = null, $direction = null)
    {

        // Load the filter state.
        $search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
        $this->setState('filter.search', $search);


        // List state information.
        parent::populateState('a.title', 'asc');
    }

    protected function getListQuery()
    {
        $db = JFactory::getDbo();

        $query = $db->getQuery(true);

        $query->select('n.*, u.username')->from('#__cnotes_notes AS n')->leftJoin('#__users AS u ON n.created_by = u.id');

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('n.id = '.(int) substr($search, 3));
            } else {
                $search = $db->Quote('%'.$db->escape($search, true).'%');
                $query->where('(n.title LIKE '.$search .')');
            }
        }

        // Add the list ordering clause.
        $orderCol	= $this->state->get('list.ordering');
        $orderDirn	= $this->state->get('list.direction');

        $query->order($db->escape($orderCol.' '.$orderDirn));


        return $query;
    }
}
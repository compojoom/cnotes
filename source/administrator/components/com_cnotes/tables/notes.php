<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

class cnotesTableNotes extends JTable {

    public function __construct(&$db) {
        parent::__construct('#__cnotes_notes', 'id', $db);
    }
}
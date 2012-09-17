<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controlleradmin');

class CnotesControllerNotes extends JControllerAdmin {

    public function getModel($name='Note', $prefix="cnotesModel", $config = array()) {
        return parent::getModel($name, $prefix, $config);
    }
}
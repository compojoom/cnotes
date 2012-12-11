<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controllerform');

class CnotesControllerNote extends JControllerForm {

	/**
	 * override allowEdit as we don't have core.edit...
	 * @param array $data
	 * @param string $key
	 * @return bool
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		return JFactory::getUser()->authorise('core.edit.edit', $this->option);
	}
}
<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');


class cnotesController extends JControllerLegacy {

	public function display($cachable = false, $urlparams = false) {
		// Check for edit form.
		$id		= JFactory::getApplication()->input->getInt('id', 0);
		$layout	= JFactory::getApplication()->input->getInt('layout', 'edit');
		if ($layout == 'edit' && !$this->checkEditId('com_cnotes.edit.note', $id)) {
			// Somehow the person just went to the form - we don't allow that.
			throw new Exception(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id), 403);
		}

		parent::display($cachable, $urlparams);

		return $this;
	}
}
<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 12.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables/');

// some black magic with the language files
$jlang =& JFactory::getLanguage();
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, null, true);
$jlang->load('com_cnotes', JPATH_SITE, 'en-GB', true);
$jlang->load('com_cnotes', JPATH_SITE, $jlang->getDefault(), true);
$jlang->load('com_cnotes', JPATH_SITE, null, true);


jimport('joomla.application.component.controllerlegacy');

$controller = JControllerLegacy::getInstance('cnotes');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
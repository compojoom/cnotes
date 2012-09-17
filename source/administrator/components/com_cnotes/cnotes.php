<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 12.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');


jimport('joomla.application.component.controller');
// register the helpers
JLoader::discover('cnotesHelper', JPATH_COMPONENT_ADMINISTRATOR . '/helpers/');
//load live update
require_once JPATH_COMPONENT_ADMINISTRATOR.'/liveupdate/liveupdate.php';

$input = JFactory::getApplication()->input;
// do some black magic for the language
$jlang =& JFactory::getLanguage();
$jlang->load('com_cnotes', JPATH_SITE, 'en-GB', true);
$jlang->load('com_cnotes', JPATH_SITE, $jlang->getDefault(), true);
$jlang->load('com_cnotes', JPATH_SITE, null, true);
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, 'en-GB', true);
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, $jlang->getDefault(), true);
$jlang->load('com_cnotes', JPATH_ADMINISTRATOR, null, true);

if($input->get('view') == 'liveupdate') {
    LiveUpdate::handleRequest();
    return;
}

$controller = JController::getInstance('cnotes');
$controller->execute($input->get('task'));
$controller->redirect();
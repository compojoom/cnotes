<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 18.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

JLoader::discover('modCnotes', dirname(__FILE__) );

$items = &modCnotesHelper::getList($params);


require JModuleHelper::getLayoutPath('mod_cnotes', $params->get('layout', 'default'));

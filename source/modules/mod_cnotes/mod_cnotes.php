<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 18.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$items = &modCnotesHelper::getList($params);


require JModuleHelper::getLayoutPath('mod_cnotes', $params->get('layout', 'default'));

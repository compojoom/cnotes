<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 17.09.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

class cnotesHelperUtils {
        public static function footer() {
            $footer = '<p style="text-align: center; margin-top: 15px;" class="copyright"> ';
            $footer .= 'CNotes - User notes for <a href="http://joomla.org" target="_blank">Joomla!™</a>';
            $footer .= ' by <a href="https://compojoom.com">compojoom.com</a>';
            $footer .= '</p>';
            return $footer;
    }
}
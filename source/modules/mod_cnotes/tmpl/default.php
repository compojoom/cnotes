<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

Jhtml::_('behavior.framework', true);
$document = JFactory::getDocument();

$document->addScript(JURI::root().'/media/mod_cnotes/js/cnotes.js');

$uri = JFactory::getURI();

?>



<table>
    <?php foreach($items as $item) : ?>
        <tr>
            <td>
                <a href="<?php echo JRoute::_('index.php?option=com_notes&task=note.edit&id='.$item->id); ?>">
                    <?php echo $item->title; ?>
                </a>
            </td>
            <td><?php echo $item->note; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<form id="cnotes" action="index.php?option=com_cnotes&format=raw&task=note.add" method="post">
    title: <input type="text" name="jform[title]" /> <br />
    text: <textarea rows="5" cols="5" name="jform[note]"></textarea> <br />
    <input type="submit" value="submit" />
</form>
<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

?>

<form name="adminForm" action="<?php echo JRoute::_('index.php?option=com_cnotes&view=notes'); ?>">
    <table class="adminlist">
        <tbody>
        <?php foreach ($this->items as $i => $item) : ?>
        <tr class="row<?php echo $i % 2; ?>">
            <td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
            <td><?php echo $item->title; ?></td>
            <td><?php echo $item->note; ?></td>
        </tr>
            <?php endforeach; ?>
        </tbody>

        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value=""/>
    </table>
</form>
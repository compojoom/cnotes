<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>
<form action="<?php echo JRoute::_('index.php?option=com_cnotes&view=notes'); ?>" method="post" name="adminForm"
      id="adminForm">
    <div class="filter-search fltlft">
        <label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
        <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_NOTES_SEARCH_IN_TITLE'); ?>" />
        <button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
        <button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
    </div>

    <div class="clr"> </div>

    <table class="adminlist">
        <thead>
            <tr>
                <th></th>
                <th><?php echo JHtml::_('grid.sort',  'JGLOBAL_TITLE', 'n.title', $listDirn, $listOrder); ?></th>
                <th>note</th>
                <th>username</th>
            </tr>
        </thead>
        <?php foreach ($this->items as $i => $item) : ?>
        <tr class="row<?php echo $i%2; ?>">
            <td class="center">
                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
            </td>
            <td><?php echo $item->title; ?></td>
            <td><?php echo $item->note; ?></td>
            <td><?php echo $item->username; ?></td>
        </tr>
        <?php endforeach; ?>

        <tfoot>
        <tr>
            <td colspan="10">
                <?php echo $this->pagination->getListFooter(); ?>
            </td>
        </tr>
        </tfoot>
    </table>

    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />

    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
</form>
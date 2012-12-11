<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

$listDir = $this->escape($this->state->get('list.direction'));
$listOrder = $this->escape($this->state->get('list.ordering'));

JHtml::_('stylesheet', 'media/com_cnotes/css/cnotes.css');

?>
<form name="adminForm" id="adminForm" method="post" class="table table-stripped"
      action="<?php echo JRoute::_('index.php?option=com_cnotes&view=notes'); ?>">
    <div class="filter-search fltlft btn-toolbar">
		<div class="btn-group pull-left">
			<label class="filter-search-lbl pull-left" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search"
				   value="<?php echo $this->escape($this->state->get('filter.search')); ?>"
				   title="<?php echo JText::_('COM_CNOTES_SEARCH_IN_TITLE'); ?>"/>
		</div>
		<div class="btn-group pull-left">
			<button type="submit" class="btn"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" class="btn"
					onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
    </div>
    <div class="clr clear"></div>
    <table class="adminlist">
        <thead>
        <tr>
            <th width="2%"><input type="checkbox" name="checkall-toggle" value=""
                                  title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)"/>
            </th>
            <th style="text-align: left;"><?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'n.title', $listDir, $listOrder); ?></th>
            <th style="text-align: left;"><?php echo JText::_('COM_CNOTES_NOTE'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if($this->items) : ?>
            <?php foreach ($this->items as $i => $item) : ?>
            <tr class="row<?php echo $i % 2; ?>">
                <td><?php echo JHtml::_('grid.id', $i, $item->id); ?></td>
                <td><?php echo $item->title; ?></td>
                <td><?php echo $item->note; ?></td>
            </tr>
                <?php endforeach; ?>
            </tbody>
        <?php else : ?>
            <tr>
                <td colspan="3">
                    <?php echo JText::_('COM_CNOTES_NO_NOTES'); ?>
                </td>
            </tr>
        <?php endif; ?>
        <tfoot>
        <tr>
            <td colspan="3">
                <?php echo $this->pagination->getListFooter(); ?>
            </td>
        </tr>

        </tfoot>

        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>

        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDir; ?>"/>
    </table>

    <?php echo JHtml::_('form.token'); ?>
</form>

<?php echo cnotesHelperUtils::ad(); ?>

<?php echo cnotesHelperUtils::footer(); ?>



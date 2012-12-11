<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 03.08.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

$listDir = $this->escape($this->state->get('list.direction'));
$listOrder = $this->escape($this->state->get('list.ordering'));

JHtml::_('stylesheet', 'media/com_cnotes/css/cnotes.css');
?>
<h2><?php echo JText::_('COM_CNOTES_YOUR_NOTES'); ?></h2>
<form name="adminForm" id="adminForm" method="post"
      action="<?php echo JRoute::_('index.php?option=com_cnotes&view=notes'); ?>">
    <div class="filter-search fltlft">
        <label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
        <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_CNOTES_SEARCH_IN_TITLE'); ?>" />
        <button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
        <button type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
    </div>
    <div class="clear"></div>
    <table class="cnotes-table">
        <thead>
        <tr>
            <th width="15%"><?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'n.title', $listDir, $listOrder); ?></th>
            <th><?php echo JText::_('COM_CNOTES_NOTE'); ?></th>
            <th>URL</th>
			<?php if($this->canDelete) : ?>
            	<th></th>
			<?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->items as $i => $item) : ?>
            <tr class="row<?php echo $i % 2; ?>">
                <td>
					<?php if($this->canEdit) : ?>
                    	<a href="<?php echo JRoute::_('index.php?option=com_cnotes&task=note.edit&id='.$item->id); ?>">
                        	<?php echo $item->title; ?>
                    	</a>
					<?php else : ?>
						<?php echo $item->title; ?>
					<?php endif; ?>
                </td>
                <td><?php echo $item->note; ?></td>
                <td>
                    <a href="<?php echo JURI::getInstance()->toString(array('scheme','user','pass','host', 'port')).$item->url; ?>"
                            target="_blank"
                            >
                        <?php echo $item->url; ?>
                    </a>
                </td>
				<?php if($this->canDelete) : ?>
					<td>
						<a href="<?php echo JRoute::_('index.php?option=com_cnotes&task=note.delete&id='.$item->id.'&'. JSession::getFormToken() .'=1'); ?>">
							<?php echo JText::_('COM_CNOTES_DELETE'); ?>
						</a>
					</td>
				<?php endif; ?><
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" class="pagination">
                <?php echo $this->pagination->getListFooter(); ?>
            </td>
        </tr>

        </tfoot>

        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>

        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDir; ?>"/>
    </table>

    <?php echo JHtml::_( 'form.token' ); ?>
</form>
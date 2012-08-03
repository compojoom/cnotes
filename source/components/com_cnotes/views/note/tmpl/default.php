<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 03.08.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();
$document->addStyleSheet('/media/com_cnotes/css/cnotes.css');
?>

<form name="adminForm" action="<?php JRoute::_('index.php?option=com_cnotes&view=note&id='.(int)$this->item->id); ?>" method="post">
    <button class="rgt">
        <?php echo JText::_('COM_CNOTES_ADD_NOTE'); ?>
    </button>

    <ul>
        <li>
            <?php echo $this->form->getLabel('title'); ?>
            <?php echo $this->form->getInput('title'); ?>
        </li>
    </ul>

    <div>
        <?php echo $this->form->getInput('note'); ?>
    </div>

    <div class="clear"></div>

    <input name="task" value="note.add" type="hidden" />
    <?php echo JHtml::_('form.token'); ?>
</form>
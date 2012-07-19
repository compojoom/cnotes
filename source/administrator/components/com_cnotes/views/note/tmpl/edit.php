<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

Jhtml::_('behavior.formvalidation');
?>

<script type="text/javascript">
    Joomla.submitbutton = function(task)
    {
        if (task == 'note.cancel' || document.formvalidator.isValid(document.id('note-form'))) {
        <?php echo $this->form->getField('note')->save(); ?>
            Joomla.submitform(task, document.getElementById('note-form'));
        }
        else {
            alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_cnotes&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="note-form" class="form-validate">
    <ul class="adminformlist">
        <li><?php echo $this->form->getLabel('title'); ?>
            <?php echo $this->form->getInput('title'); ?></li>

        <li><?php echo $this->form->getLabel('created_by'); ?>
            <?php echo $this->form->getInput('created_by'); ?></li>
    </ul>
        <div>
            <?php echo $this->form->getLabel('note'); ?>
                <?php echo $this->form->getInput('note'); ?>
            </div>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>

<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

JHtml::_('stylesheet', 'media/com_cnotes/css/cnotes.css');
?>

<form name="adminForm" action="<?php JRoute::_('index.php?option=com_cnotes&view=note'); ?>" method="post">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <ul class="adminformlist">
                <li>
                    <?php echo $this->form->getLabel('title'); ?>
                    <?php echo $this->form->getInput('title'); ?>
                </li>
                <li>
                    <?php echo $this->form->getLabel('created_by'); ?>

                    <?php echo $this->form->getInput('created_by'); ?>
                </li>
            </ul>

            <div>
                <?php echo $this->form->getLabel('note'); ?>
                <div class="clr"></div>
                <?php echo $this->form->getInput('note'); ?>
                <div class="clr"></div>
            </div>

        </fieldset>
    </div>

    <input name="task" value="" type="hidden"/>
    <?php echo JHtml::_('form.token'); ?>
</form>

<div class="clear"></div>

<?php echo cnotesHelperUtils::footer(); ?>
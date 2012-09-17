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
$document->addScript(JURI::root() . '/media/mod_cnotes/js/cnotes.js');
$document->addStyleSheet(JURI::root() . '/media/mod_cnotes/css/cnotes.css');
$url = JFactory::getURI();
$user = JFactory::getUser();
$id = $module->id;

$script = "window.addEvent('domready', function () {
    var notes = new cnotes({container: 'cnotes-".$id."'});
});";

$document->addScriptDeclaration($script);
?>

<div id="cnotes-<?php echo $id; ?>" class="cnotes">
    <?php if ($user->get('id')) : ?>
    <div class="cnotes-notes">
        <?php if (count($items)) : ?>
            <?php foreach ($items as $item) : ?>
            <div>
                <span class="title">
                    <a href="<?php echo JRoute::_('index.php?option=com_cnotes&task=note.edit&id=' . $item->id); ?>">
                        <?php echo $item->title; ?>
                    </a>
                </span>
                <?php echo $item->note; ?>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <span class="cnotes-nothing">
                <?php echo JText::_('MOD_CNOTES_NO_NOTES'); ?>
            </span>
        <?php endif; ?>
    </div>

    <span class="cnotes-toggle"> Add a new note</span>
    <form class="cnotes-form" action="index.php?option=com_cnotes&format=raw&task=note.add" method="post">
        <fieldset>
            <label for="title-<?php echo $id; ?>">
                <?php echo JText::_('MOD_CNOTES_TITLE'); ?>*:
            </label>
            <input type="text" id="title-<?php echo $id; ?>" class="required" name="jform[title]"/>
            <label for="note-<?php echo $id; ?>">
                <?php echo JText::_('MOD_CNOTES_NOTE'); ?>*:
            </label>
            <textarea rows="5" cols="5" id="note-<?php echo $id; ?>" class="required" name="jform[note]"></textarea>

            <input type="submit" value="<?php echo JText::_('COM_CNOTES_SAVE_NOTE'); ?>" />

        </fieldset>


        <input type="hidden" name="jform[url]" value="<?php echo $url->toString(array('path')); ?>"/>
        <?php echo JHtml::_('form.token'); ?>
        <div class="clear"></div>
    </form>
    <?php else : ?>
    <?php // don't show the module to people that are not logged in ?>
    <?php echo JText::_('MOD_CNOTES_WARNING_REGISTERED'); ?>
    <?php endif; ?>

</div>
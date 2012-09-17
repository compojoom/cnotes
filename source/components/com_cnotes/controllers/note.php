<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 20.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controllerform');

class cnotesControllerNote extends JControllerForm {

    protected $view_list = 'notes';


    /**
     * Removes a note
     *
     * @return  void
     *
     */
    public function delete()
    {
        // Check for request forgeries
        JSession::checkToken('GET') or die(JText::_('JINVALID_TOKEN'));
        $input = JFactory::getApplication()->input;
        // Get items to remove from the request.
        $id = $input->get('id',0,'int');

        // Get the model.
        $model = $this->getModel('Note', 'cnotesModel');

        // Remove the items.
        if ($model->delete($id))
        {
            $this->setMessage(JText::_('COM_CNOTES_NOTE_DELETED'));
        }
        else
        {
            $this->setMessage($model->getError());
        }


        $this->setRedirect(JRoute::_('index.php?option=com_cnotes&view=' . $this->view_list, false));
    }
}
<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 20.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');


class plgContentDummy extends JPlugin
{

    /**
     * Plugin that loads module positions within content
     *
     * @param	string	The context of the content being passed to the plugin.
     * @param	object	The article object.  Note $article->text is also available
     * @param	object	The article params
     * @param	int		The 'page' number
     */
	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{

//        var_dump($article);

//        $text = $article->text;

//        $article->text = str_replace('###something###', '##########something#########else', $article->text);
//
//
//        $mailer = JFactory::getMailer();
//
//        $mailer->addRecipient('yves@compojoom.com');
//
//        $mailer->setSender(array('daniel@comopjoom.com', 'daniel'));
//
//        $mailer->setSubject('my subject');
//        $mailer->setBody('this is our body');
//
//        $mailer->sendMail();



//        var_dump($text);

//        die();
    }

}
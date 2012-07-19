<?php
/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 18.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die('Restricted access');

Jhtml::_('behavior.framework');
//echo 'test';

require_once JPATH_ROOT .'/configuration.php';
$config = new JConfig;
$username = $config->user;
$password = $config->password;;
$hostname = $config->host;
$dbh = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

$selected = mysql_select_db($config->db,$dbh)
    or die("Could not select first_test");

$user = JFactory::getUser();

$result = mysql_query("SELECT * FROM jos_cnotes_notes WHERE created_by = " . $user->id);

echo '<table>';
while($row = mysql_fetch_array($result))
{
    echo '<tr>';
    echo '<td><a href="index.php?option=com_cnotes&task=edit&id='.$row['id'].'">'.$row['title'] .'</a>' . '</td><td>' . $row['note'] . '</td>';
    echo '</tr>';
}
echo '</table>';


mysql_close($dbh);
?>


<form id="cnotes" action="index.php?option=com_cnotes&task=new" method="post">
    title: <input type="text" name="title" /> <br />
    text: <textarea rows="5" cols="5" name="note"></textarea> <br />
    <input type="submit" value="submit" />
</form>

<script type="text/javascript">
    window.addEvent('domready', function() {
        document.id('cnotes').addEvent('submit', function() {
            console.log('submit');

            var self = this;
            var request = new Request.JSON({
                url: document.id('cnotes').get('action'),
                data: self,
                onComplete: function() {
                    console.log('complete');
                }
            });
            request.send();
            return false;
        }) ;
    });
</script>
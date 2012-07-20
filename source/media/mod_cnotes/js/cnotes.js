/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */


window.addEvent('domready', function () {
    document.id('cnotes').addEvent('submit', function () {
        console.log('submit');

        var self = this;
        var request = new Request.JSON({
            url:document.id('cnotes').get('action'),
            data:self,
            onComplete:function () {
                console.log('complete');
            }
        });
        request.send();
        return false;
    });
});

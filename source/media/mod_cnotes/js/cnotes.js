/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

var cnotes = new Class({
    Implements: [Options],
    options: {
        container: 'cnotes',
        table: 'cnotes-notes'
    },
    initialize: function(options) {
        this.setOptions(options);

        var el = document.id(this.options.container);
        if(el) {
            this.start();
        }


    },

    start: function() {
        var form = document.id(this.options.container);
        var validator = new Form.Validator.Inline(form);
        form.addEvent('submit', function() {
            var request = new Request.JSON({
                url:form.get('action'),
                data:form,
                onComplete:function (data) {
                    if(data.status == 'OK') {
                        alert('Everything went fine');

                        var div = new Element('div', {
                           'html' : '<span class="title"><a href="'+data.note.edit+'">'+data.note.title+'</a></span>' + data.note.note
                        });
                        div.inject('cnotes-notes');
                    }
                }
            });

            if(validator.validate()) {
                request.send();
            }
            return false;
        });
    }
});

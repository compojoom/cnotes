/**
 * @author Daniel Dimitrov - compojoom.com
 * @date: 19.07.12
 *
 * @copyright  Copyright (C) 2008 - 2012 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

var cnotes = new Class({
    Implements:[Events, Options],
    options:{
        container:'cnotes',
        onNoteAdded: function() {
            this.slide.slideOut();
        }
    },
    initialize:function (options) {
        this.setOptions(options);

        var el = document.id(this.options.container);
        if (el && el.getElement('form')) {
            this.container = el;
            this.setupForm();
            this.setupAnim();
        }
    },

    setupForm:function () {
        var container = this.container,
            form = container.getElement('form'),
            validator = new Form.Validator.Inline(form),
            nothing = $$('.cnotes .cnotes-nothing'),
            notes = container.getElement('.cnotes-notes'),
            self = this;

        form.addEvent('submit', function () {
            var request = new Request.JSON({
                url:form.get('action'),
                data:form,
                onComplete:function (data) {
                    if (data.status == 'OK') {
                        self.fireEvent('noteAdded');
                        if (nothing.length) {
                            nothing[0].destroy();
                        }
                        var div = new Element('div', {
                            'html':'<span class="title"><a href="' + data.note.edit + '">' + data.note.title + '</a></span>' + data.note.note
                        });
                        div.inject(notes).highlight('#F3FF35');
                        form.reset();
                    } else if(data.status == 'FAILURE') {
						new Element('div', {
							html: data.message,
							'class': 'alert'
						}).inject(notes).highlight('#FF0000');
					}
                }
            });

            if (validator.validate()) {
                request.send();
            }
            return false;
        });
    },

    setupAnim: function () {
        var container = this.container,
            slide = this.slide = new Fx.Slide(container.getElement('form'), {resetHeight: true}).hide(),
            toggle = container.getElement('.cnotes-toggle');

        toggle.addEvent('click', function () {
            slide.toggle();
        })
    }
});
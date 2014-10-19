define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      template = require('text!templates/volcano_select.html');

  return Backbone.View.extend({
    el: '#volcano-selection-container',

    template: _.template(template),

    events: {
      'change select': 'change'
    },
    
    initialize: function(options) {
      _(this).bindAll('render');
      this.observer = options.observer;
      this.collection.fetch();
      this.listenTo(this.collection, 'sync', this.render);
    },

    render: function() {
      this.$el.html(this.template({
        volcanoes: this.collection.models
      }));
      this.change();
    },

    change: function() {
      var vd_id = this.$el.find('select').val();
      if (vd_id) 
        this.observer.trigger('change-volcano-selection', vd_id);
    }
  });
});
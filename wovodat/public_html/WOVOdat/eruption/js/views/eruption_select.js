define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      template = require('text!templates/eruption_select.html');

  return Backbone.View.extend({
    el: '#eruption-selection-container',

    template: _.template(template),

    events: {
      'change select': 'changeEruption'
    },
    
    initialize: function(options) {
      _(this).bindAll('render', 'changeVolcano');
      this.observer = options.observer;
      this.listenTo(this.observer, 'change-volcano-selection', this.changeVolcano);
      this.listenTo(this.collection, 'sync', this.render);
    },

    changeVolcano: function(vd_id) {
      this.collection.changeVolcano(vd_id);
    },

    render: function() {
      this.$el.html(this.template({
        eruptions: this.collection.models
      }));
    },

    changeEruption: function() {
      this.collection.trigger('change', parseInt(this.$el.find('select').val(), 10));
    }
  });
});
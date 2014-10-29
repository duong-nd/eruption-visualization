define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      template = require('text!templates/time_series_select.html');

  return Backbone.View.extend({
    el: '#time-series-selection-container',

    events: {
      'change input': 'onChange'
    },

    template: _.template(template),
    
    initialize: function(options) {
      _(this).bindAll('render', 'changeVolcano');
      this.selectings = options.selectingTimeSeries;
      this.observer = options.observer;
      this.listenTo(this.observer, 'change-volcano-selection', this.changeVolcano);
      this.listenTo(this.collection, 'sync', this.render);
    },

    changeVolcano: function(vd_id) {
      this.collection.changeVolcano(vd_id);
    },

    render: function() {
      this.$el.html(this.template({
        timeSeries: this.collection.models
      }));
    },

    onChange: function(event) {
      var input = event.target,
          id = $(input).val();
      if ($(input).is(':checked'))
        this.selectings.add(id);
      else 
        this.selectings.remove(this.selectings.get(id));
    }
  });
});
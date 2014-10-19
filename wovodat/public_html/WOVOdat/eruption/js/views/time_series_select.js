define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      template = require('text!templates/time_series_select.html'),
      TimeSeriesGraph = require('views/time_series_graph'),
      TimeSerie = require('models/time_serie');

  return Backbone.View.extend({
    el: '#time-series-selection-container',

    events: {
      'change input': 'onChange'
    },

    template: _.template(template),
    
    initialize: function(options) {
      _(this).bindAll('render', 'changeVolcano');
      this.observer = options.observer;
      this.listenTo(this.observer, 'change-volcano-selection', this.changeVolcano);
      this.listenTo(this.collection, 'sync', this.render);
      this.graphs = {};
    },

    changeVolcano: function(vd_id) {
      this.collection.changeVolcano(vd_id);
    },

    render: function() {
      this.$el.html(this.template({
        timeSeries: this.collection.models
      }));
    },

    createGraph: function(id) {
      this.graphs[id] = new TimeSeriesGraph({
        model: new TimeSerie()
      });
      this.graphs[id].$el.appendTo(this.$el);
    },

    deleteGraph: function(id) {
    },

    onChange: function(event) {
      var input = event.target,
          id = $(input).val();
      if (!this.graphs[id]) {
        this.createGraph(id);
      } else {
        this.deleteGraph(id);
      }
    }
  });
});
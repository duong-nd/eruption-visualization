define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      Serie = require('models/serie'),
      TimeSerieGraph = require('views/time_serie_graph'),
      OverviewGraph = require('views/overview_graph');

  return Backbone.View.extend({
    el: '#time-series-container',
    
    initialize: function(options) {
      _(this).bindAll('addSerie', 'removeSerie');

      this.timeRange = options.timeRange;

      this.graphs = {};

      this.listenTo(this.collection, 'add', this.addSerie);
      this.listenTo(this.collection, 'remove', this.removeSerie);

      this.render();
    },

    renderOverviewGraph: function(sr_id) {
    },

    addSerie: function(sr_id) {
      this.graphs[sr_id] = new TimeSerieGraph({
        model: this.collection.get(sr_id),
        timeRange: this.timeRange
      });

      this.$el.append(this.graphs[sr_id].$el);
    },

    removeSerie: function(sr_id) {
      this.graphs[sr_id].destroy();
    },

    render: function() {
      this.overviewGraph = new OverviewGraph({
        collection: this.collection
      });
      this.overviewGraph.$el.appendTo(this.$el);
    }
  });
});
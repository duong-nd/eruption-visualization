define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      Serie = require('models/serie'),
      TimeSerieGraph = require('views/time_serie_graph'),
      OverviewGraph = require('views/overview_graph'),
      TimeRange = require('models/time_range');

  return Backbone.View.extend({
    el: '',
    
    initialize: function(options) {
      _(this).bindAll('addSerie', 'removeSerie');

      this.timeRange = options.timeRange;
      this.overviewSelectingTimeRange = new TimeRange();

      this.graphs = {};

      this.listenTo(this.collection, 'add', this.addSerie);
      this.listenTo(this.collection, 'remove', this.removeSerie);

      this.render();
    },

    addSerie: function(sr_id) {
      this.graphs[sr_id] = new TimeSerieGraph({
        model: this.collection.get(sr_id),
        timeRange: this.overviewSelectingTimeRange
      });

      this.$el.append(this.graphs[sr_id].$el);
    },

    removeSerie: function(sr_id) {
      this.graphs[sr_id].destroy();
    },

    render: function() {
      this.overviewGraph = new OverviewGraph({
        collection: this.collection,
        timeRange: this.timeRange,
        selectingTimeRange: this.overviewSelectingTimeRange
      });
      this.overviewGraph.$el.appendTo(this.$el);
    }
  });
});
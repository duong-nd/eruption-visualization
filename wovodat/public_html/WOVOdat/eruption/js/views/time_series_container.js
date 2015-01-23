define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      Serie = require('models/serie'),
      TimeSerieGraph = require('views/time_serie_graph'),
      OverviewGraph = require('views/overview_graph'),
      FilterSelect = require('views/filter_select'),
      Filter = require('models/filter'),      
      TimeRange = require('models/time_range');

  return Backbone.View.extend({
    el: '',
    
    initialize: function(options) {
      _(this).bindAll('addSerie', 'removeSerie', 'clear');

      this.timeRange = options.timeRange;
      this.overviewSelectingTimeRange = new TimeRange();

      this.filter_select = {};
      this.graphs = {};
      this.selectingFilter = {};

      this.listenTo(this.collection, 'reset', this.clear);

      this.listenTo(this.collection, 'add', this.addSerie);
      this.listenTo(this.collection, 'remove', this.removeSerie);

      this.render();
    },

    clear: function() {
      if (this.collection.length === 0) {
        this.overviewGraph.destroy();
        for (var g in this.graphs) {
          if (this.graphs.hasOwnProperty(g)) {
            this.graphs[g].destroy();
            this.selectingFilter[g].destroy();
          }
        }
        this.graphs = {};
        this.selectingFilter = {};
        this.render();
      }
    },

    addSerie: function(sr_id) {
      this.selectingFilter[sr_id] = new Filter();      
      
      this.filter_select[sr_id] = new FilterSelect({
        model: this.collection.get(sr_id),
        filter : this.selectingFilter[sr_id]
      });

      this.graphs[sr_id] = new TimeSerieGraph({
        model: this.collection.get(sr_id),
        filter: this.selectingFilter[sr_id],
        timeRange: this.overviewSelectingTimeRange
      });      
      
      this.$el.append(this.filter_select[sr_id].$el);
      this.$el.append(this.graphs[sr_id].$el);
    },

    removeSerie: function(sr_id) {
      this.filter_select[sr_id].destroy();    
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
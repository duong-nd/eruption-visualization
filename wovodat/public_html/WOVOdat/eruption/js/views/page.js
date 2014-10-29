define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      Pace = require('pace'),
      template = require('text!templates/page.html'),
      Volcano = require('models/volcano'),
      Volcanoes = require('collections/volcanoes'),
      Eruptions = require('collections/eruptions'),
      VolcanoSelect = require('views/volcano_select'),
      EruptionSelect = require('views/eruption_select'),
      EruptionGraph = require('views/eruption_graph'),
      EruptionForecasts = require('collections/eruption_forecasts'),
      EruptionForecastGraph = require('views/eruption_forecast_graph'),
      TimeSeries = require('collections/time_series'),
      TimeSeriesSelect = require('views/time_series_select'),
      TimeRange = require('models/time_range'),
      SelectingTimeSeries = require('collections/selecting_time_series'),
      TimeSeriesContainer = require('views/time_series_container');

  return Backbone.View.extend({
    el: '#main',
    
    initialize: function() {
      this.render();
    },

    render: function() {
      var eruptions = new Eruptions(),
          observer = new (Backbone.Model.extend())(),
          timeRange = new TimeRange(),
          selectingTimeSeries = new SelectingTimeSeries();

      new VolcanoSelect({
        collection: new Volcanoes(),
        observer: observer
      });

      new EruptionSelect({
        collection: eruptions,
        observer: observer
      });

      new EruptionGraph({
        collection: eruptions,
        observer: observer,
        timeRange: timeRange
      });

      new EruptionForecastGraph({
        collection: new EruptionForecasts(),
        observer: observer,
        timeRange: timeRange
      });

      new TimeSeriesSelect({
        collection: new TimeSeries(),
        observer: observer,
        selectingTimeSeries: selectingTimeSeries
      });

      new TimeSeriesContainer({
        observer: observer,
        timeRange: timeRange,
        collection: selectingTimeSeries
      });
    }
  });
});
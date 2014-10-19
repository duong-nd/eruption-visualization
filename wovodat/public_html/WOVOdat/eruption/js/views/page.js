define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
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
      TimeSeriesSelect = require('views/time_series_select');

  return Backbone.View.extend({
    el: '#main',
    
    initialize: function() {
      this.volcano = new Volcano();
      this.render();
    },

    render: function() {
      var eruptions = new Eruptions(),
          observer = new (Backbone.Model.extend())();

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
        observer: observer
      });

      new EruptionForecastGraph({
        collection: new EruptionForecasts(),
        observer: observer
      });

      new TimeSeriesSelect({
        collection: new TimeSeries(),
        observer: observer
      });
    }
  });
});
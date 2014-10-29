define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore');

  return Backbone.View.extend({
    initialize: function(options) {
      _(this).bindAll('update');
      this.listenTo(this.collection, 'change', this.update);
    },

    render: function() {
      var options = {
            series: {
              lines: { 
                show: true
              },
              shadowSize: 0
            },
            xaxis: { 
              mode:'time'
            },
            selection: { 
              mode: "x", 
              color: '#451A2B' 
            }
          };

    },

    update: function() {
      this.prepareData();
    },

    prepareData: function() {
      var minX = undefined,
          maxX = undefined,
          data = [],
          i;

      this.collection.models.forEach(function(serie) {
        var list = [];

        serie.get('data').forEach(function(d) {
          var x = d.startTime || d.time;
          if (minX === undefined || x < minX)
            x = minX;
          if (maxX === undefined || x > maxX)
            x = maxX;

          list.push([d.x, d.value]);
        });

        data.push({
          data: list
        });
      });

      this.minX = minX;
      this.maxX = maxX;
      this.data = data;
    }

  });
});
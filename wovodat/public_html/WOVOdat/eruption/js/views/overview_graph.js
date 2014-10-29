define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      flot = require(['jquery.flot', 'jquery.flot.time', 'jquery.flot.navigate', 'jquery.flot.selection']);

  return Backbone.View.extend({
    initialize: function(options) {
      _(this).bindAll('update');
      this.listenTo(this.collection, 'change remove', this.update);
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
            yaxis: {
              show: false
            },
            selection: { 
              mode: "x", 
              color: '#451A2B' 
            }
          };

      if (!this.data || !this.data.length) {
        this.$el.html('');
        return;
      }

      this.$el.width(800);
      this.$el.height(50);

      $.plot(this.$el, this.data, options);
    },

    update: function() {
      this.prepareData();
      this.render();
    },

    prepareData: function() {
      var minX = undefined,
          maxX = undefined,
          data = [],
          i;

      this.collection.models.forEach(function(serie) {
        var list = [];
        if (serie.get('data')) {
          serie.get('data').forEach(function(d) {
            var x = d.start_time || d.time;
            if (minX === undefined || x < minX)
              minX = x;
            if (maxX === undefined || x > maxX)
              maxX = x;

            list.push([x, d.value]);
          });
        }

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
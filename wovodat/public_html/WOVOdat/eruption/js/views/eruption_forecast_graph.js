define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      flot = require(['jquery.flot']),
      Const = require('helper/const'),
      ed_phs_forTemplate = require('text!templates/tooltip_ed_phs_for.html'),
      tooltip = require('views/tooltip');

  return Backbone.View.extend({
    el: '#eruption-forecast-graph',
    
    initialize: function(options) {
      _(this).bindAll('render', 'onHover', 'onTimeRangeChange', 'onDataChange', 'onVolcanoChange');
      this.observer = options.observer;
      this.timeRange = options.timeRange;
      this.listenTo(this.observer, 'change-volcano-selection', this.onVolcanoChange);
      this.listenTo(this.timeRange, 'change', this.onTimeRangeChange);
      this.listenTo(this.collection, 'sync', this.onDataChange);
    },

    onHover: function(event, pos, item) {
      var content;
      if (item) {
        tooltip.remove();
        content = _.template(ed_phs_forTemplate, item.series.data[item.dataIndex][4]);      
        tooltip.render(pos.pageX, pos.pageY, content);
      } else {
        tooltip.remove();
      }
    },

    onDataChange: function() {
      // Prepares data.
      var data = this.collection.models,
          ed_forData = [];

      data.forEach(function(ed_for) {
        var ed_for_astime = ed_for.get('ed_for_astime'),
            ed_for_aetime = ed_for.get('ed_for_aetime');
        ed_forData.push([ed_for_astime, 2, 0, ed_for_aetime - ed_for_astime, ed_for.attributes]);
      });

      // Saves prepared data to the view object.
      this.data = ed_forData;

      this.render({
        startTime: this.startTime,
        endTime: this.endTime,
        data: this.data
      });
    },

    onVolcanoChange: function(vd_id) {
      this.collection.changeVolcano(vd_id);
    },

    onTimeRangeChange: function() {
      this.startTime = this.timeRange.get('startTime');
      this.endTime = this.timeRange.get('endTime');
      this.render({
        startTime: this.startTime,
        endTime: this.endTime,
        data: this.data
      });
    },

    render: function(options) {
      var el = this.$el,
          param_ed_for = {
            label: 'Alert level',
            data: options.data,
            bars: {
              show: true,
              wovodat: true,
              drawBottom: true,
              lineWidth: 0
            },
            dataType: 'ed_for'
          },
          option = {
            grid: {
              hoverable: true
            },
            xaxis: {
              min: options.startTime,
              max: options.endTime,
              autoscale: true,
              mode: 'time',
              timeformat: '%Y-%m'
            },
            yaxis: {
              show:false,
              panRange: false
            }
          };

      if (!options || !options.startTime || !options.endTime || !options.data.length) {
        el.html('');
        return;
      }

      $.plot(el, [param_ed_for], option);
      el.bind('plothover', this.onHover);
    },
  });
});
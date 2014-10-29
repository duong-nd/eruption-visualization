define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      flot = require(['jquery.flot', 'jquery.flot.time', 'jquery.flot.navigate', 'jquery.flot.selection']),
      serieTooltipTemplate = require('text!templates/tooltip_serie.html'),
      tooltip = require('views/tooltip'),
      DateHelper = require('helper/date');

  return Backbone.View.extend({    
    initialize: function(options) {
      _(this).bindAll('prepareDataAndRender', 'onTimeRangeChange');

      this.timeRange = options.timeRange;

      this.model.fetch();
      this.listenTo(this.timeRange, 'change', this.onTimeRangeChange);
      this.listenTo(this.model, 'change', this.prepareDataAndRender);
    },

    onTimeRangeChange: function() {
      this.render();
    },

    onHover: function(event, pos, item) {
      var content;
      if (item) {
        tooltip.remove();
        content = _.template(serieTooltipTemplate, item.series.data[item.dataIndex][4]);      
        tooltip.render(pos.pageX, pos.pageY, content);
      } else {
        tooltip.remove();
      }
    },

    render: function() {
      var param_ds = {
            color: "#5EB7FF",
            label: "Data Series",
            data: this.data,
            bars: {
              show: true,
              wovodat: true
            },
            dataType: "ds"
          },
          option = {
            grid: {
              hoverable: true,
            },
            xaxis: {
              min: this.timeRange.get('startTime'),
              max: this.timeRange.get('endTime'),
              mode: "time",
              autoscale: true,
              timeformat: "%m-%d<br/>%Y"
            },
            yaxis: {
              min: 0,
              max: 200,
              autoscale: true,
              panRange: false,
              zoomRange: false
            },
          };

      this.$el.html('<div></div>');
      this.$el.width(800);
      this.$el.height(200);

      this.graph = $.plot(this.$el, [param_ds], option);
      this.$el.bind('plothover', this.onHover);
    },

    prepareDataAndRender: function() {
      var i,
          data = this.model.get('data'),
          a = [];
      this.model.get('data').forEach(function(ds) {
        ds.formattedStartTime = DateHelper.formatDate(ds.start_time);
        ds.formattedEndTime = DateHelper.formatDate(ds.end_time);
        a.push([ds.start_time, ds.value, 0, ds.end_time - ds.start_time, ds]);
      });
      this.data = a;
      this.render();
    },

    destroy: function() {
      this.undelegateEvents();
      this.$el.removeData().unbind(); 
      this.remove();  
      Backbone.View.prototype.remove.call(this);
    }
  });
});
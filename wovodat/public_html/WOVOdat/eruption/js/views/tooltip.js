define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore');
      

  return Backbone.View.extend({
    el: '',

    initialize: function(options) {
      this.template = _.template(options.template);
      _(this).bindAll('remove');
      this.$el.html('<div></div>');
      this.$el.addClass('tooltip');
      this.hide();
      this.$el.appendTo('body');
    },

    move: function(x, y) {
      this.$el.css({
        top: y + 5,
        left: x + 20,
      });
      this.show();
    },

    show: function() {
      this.$el.show();      
    },

    hide: function() {
      this.$el.hide();
    },

    render: function(x, y, content) {
      this.$el.html(content);
      this.move(x, y);
    },

    previous: {
      dataIndex: undefined,
      content: undefined
    },

    update: function(pos, item) {
      if (item) {
        if (this.previous.dataIndex === item.dataIndex) {
          this.move(pos.pageX, pos.pageY);
        } else {
          this.previous.dataIndex = item.dataIndex;
          this.previous.content = this.template(item.series.data[item.dataIndex][4]);
          this.render(pos.pageX, pos.pageY, this.previous.content);
        }
      } else {
        this.hide();
      }
    }
  });
});
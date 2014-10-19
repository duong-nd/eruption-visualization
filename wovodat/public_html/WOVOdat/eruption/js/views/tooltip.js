define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore');
      

  return new (Backbone.View.extend({
    el: '',

    initialize: function() {
      _(this).bindAll('remove');
      this.$el.html('<div></div>').addClass('tooltip');
      this.$el.appendTo('body');
    },

    render: function(x, y, content) {
      this.$el.css({
        top: y + 5,
        left: x + 20,
      });
      this.$el.find('div').html(content);
      this.$el.show();
    },

    remove: function() {
      this.$el.hide();
    }
  }))();
});
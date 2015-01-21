define(['jquery', 'backbone'], function($, Backbone) {
  'use strict';

  return Backbone.Model.extend({
    idAttribute: 'value',
    
    initialize: function(obj) {
      this.set({
        'value': obj ? obj.value : 'undefined',
      });
    }
  });
});
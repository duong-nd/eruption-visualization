define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      EruptionForecast = require('models/eruption_forecast');

  return Backbone.Collection.extend({
    model: EruptionForecast,
    
    initialize: function(ed_id) {
      if (ed_id)
        this.changeVolcano(ed_id);
    },

    changeVolcano: function(vd_id, handler) {
      this.url = 'api/?data=eruption_forecast_list&vd_id=' + vd_id;
      this.fetch().done(handler);
    }
  });
});

define(function(require) {
  'use strict';
  var $ = require('jquery'),
      Backbone = require('backbone'),
      _ = require('underscore'),
      template = require('text!templates/filter.html'),
      Filters = require('collections/filters'),
      Filter = require('models/filter');
      
  return Backbone.View.extend({
    el: '',

    template: _.template(template),

    events: {
      'change select': 'onSelectChange'
    },
    
    initialize: function(options) {
      _(this).bindAll('render', 'OptionForFilter','prepareDataAndRender', 'onSelectChange' );
      this.filter = options.filter;

      this.model.fetch();
      this.listenTo(this.model, 'change', this.prepareDataAndRender);
      this.listenTo(this.filter, 'change', this.onSelectChange);      
    },

    render: function(options) {
      this.$el.html(this.template({
        options: options
      }));
    },
    
    prepareDataAndRender: function() {
      var options = {}, data = this.model.get('data');
      options = this.OptionForFilter();
      if (options.length > 0) {
        this.render(options);
      }
      this.filter.set('value',options[0]);
    },
    
    OptionForFilter: function() {
      var data = this.model.get('data'),      
        list=[],
        a = [];
      for (var j in  data) {
        if (data[j].filter && $.inArray(data[j].filter,list) == -1){
          list.push(data[j].filter);
        }
      }
      list.forEach(function(f) {
        a.push(new Filter({value: f}));
      });
      return a;
    },
    
    onSelectChange: function(e) {
      var val = this.$el.find('select').val();
      this.filter.set('value', val);
    },
    
    destroy: function() {
      // From StackOverflow with love.
      this.undelegateEvents();
      this.$el.removeData().unbind(); 
      this.remove();  
      Backbone.View.prototype.remove.call(this);
    }
  });
});
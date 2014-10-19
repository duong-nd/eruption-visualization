define(['moment'], function(moment) {
  return {
    formatDate: function(timeStamp) {
      return moment(timeStamp / 1000, 'X').format('YYYY-MM-DD');
    }
  };
});
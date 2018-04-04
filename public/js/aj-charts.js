(function() {
  window.ajLineChart = function(containerId, dataProvider, graphs) {
    var chart;
    console.log(dataProvider);
    return chart = AmCharts.makeChart(containerId, {
      'type': 'serial',
      'theme': 'light',
      'legend': {
        'useGraphSettings': true,
        'markerSize': 12,
        'valueWidth': 0,
        'verticalGap': 0
      },
      'dataProvider': dataProvider,
      'valueAxes': [
        {
          'minorGridAlpha': 0.08,
          'minorGridEnabled': true,
          'position': 'top',
          'axisAlpha': 0
        }
      ],
      'startDuration': 1,
      'graphs': [
        {
          'balloonText': '<span style=\'font-size:13px;\'>[[title]] in [[category]]:<b>[[value]]</b></span>',
          'title': 'Activity',
          'type': 'column',
          'fillAlphas': 0.8,
          'valueField': 'activity'
        }
      ],
      'rotate': true,
      'categoryField': 'year',
      'categoryAxis': {
        'gridPosition': 'start'
      },
      'export': {
        'enabled': true
      }
    });
  };

}).call(this);

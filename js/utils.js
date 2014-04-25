function addGraph(chartId, data) {
nv.addGraph(function() {
      var chart = nv.models.multiBarChart()
            .margin({top: 30, right: 60, bottom: 50, left: 70})
            //We can set x data accessor to use index. Reason? So the bars all appear evenly spaced.
            .x(function(d,i) { return i })
            .y(function(d,i) {return d[1] })
            ;

      chart.xAxis.tickFormat(function(d) {
        var dx = data[0].values[d] && data[0].values[d][0] || 0;
        return d3.time.format('%_m/%_d/%Y')(new Date(dx))
      });

      chart.yAxis
          .tickFormat(d3.format(',.2f'));
      
      chart.yAxis.tickValues(d3.range(0, data[0]['max'], 25));

      chart.yAxis
          .tickFormat(function(d) { return d3.format(',.2f')(d) });
      
      chart.yAxis.tickValues(d3.range(0, data[1]['max'], 25));

      d3.select('#'+chartId+' svg')
        .datum(data)
        .transition()
        .duration(0)
        .call(chart);

      nv.utils.windowResize(chart.update);

      return chart;
  });
};
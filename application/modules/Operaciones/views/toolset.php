<script>

STOOLS = {
	base_url : '<?php echo site_url(); ?>',
	getvalue: function(oid,ip,comm,timeout) {
		/*$.ajax({
            'url' : this.base_url + '/snmp/get_value_oid',
            'type' : 'POST', //the way you want to send data to your URL
            'data' : {objeto : oid, direccion : ip, tiempo : timeout},
            'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                if(data){
                    return data;
                }
            }
        });//*/
        return ([(new Date()).getTime(),Math.random()]);
    }
}

POLLER = {
    base_url : '<?php echo site_url();?>',
    getvalue: function(comms) {
        $.ajax({
            'url' : this.base_url + 'index.php/Operaciones/Operaciones/poller/',
            'type' : 'POST',
            'data' : {commands : comms},
            'success' : function(data){ if(data) console.log($.parseJSON(data)); }
        });
    }    
}

function poller(comms){
    var base_url = '<?php echo site_url();?>', output = null
    $.ajax({
        'url' : base_url + 'index.php/Operaciones/Operaciones/real_time_poller/',
        type : 'POST',
        dataType: 'json',
        async : false,
        data : {commands : comms},
        success : function(data){ output=data; }
    });
    return output; 
}

function construct_series(obj,parameter)
{
    var series = [];
    $.each(obj,function( command, array_datetimes ) {
        series.push({
            name: command,
            data: (function(){
                var plot_points = [];
                $.each(array_datetimes,function(date_time,line){
                    var datetime = new Date(date_time).getTime();
                    console.log(datetime,line[parameter]);
                    plot_points.push({
                        x: datetime,
                        y: line[parameter]
                    });
                })
                return plot_points;
            })()
        });
    });
    return series;
}

function addplotpoints(obj,parameter)
{
    var series = [],a;
    $.each(obj,function( command, array_datetimes ) {
        series.push({
            a = function(){
                var plot_points = [];
                $.each(array_datetimes,function(date_time,line){
                    var datetime = new Date(date_time).getTime();
                    console.log(datetime,line[parameter]);
                    plot_points.push({
                        x: datetime,
                        y: line[parameter]
                    });
                })
                return plot_points;
            };
        });
    });
    return series;
}

$(function () {
    $(document).ready(function() {
        Highcharts.setOptions({
            global: { useUTC: false }
        });
        var cmds = "apache,chrome";
    	var chart;
    	$('#grafica-general').highcharts({
            chart: {
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {    
                        // set up the updating of the chart each second
                        var series = this.series, obj = poller(cmds);
                        /*setInterval(function() {
                            var obj = poller('chrome,apache');
                            $.each(series,function( command, array_datetimes ) {)
                            series1.addPoint([snmp1[0], snmp1[1]], true, true);
                            series2.addPoint([snmp2[0], snmp2[1]], true, true);
                        }, 000);*/
                        setInterval(function() {
                            var new_series = addplotpoints(obj,'tasa_cpu');
                            $.each(series,function(key,value){
                                series[key].addPoint(new_series[key][0].x,new_series[key][0].y);
                            });
                            /*$.each(series,function(key,array_serie) {
                                var command = obj[array_serie.name],
                                poll = (function(){ 
                                            for (var key in command) {
                                                var date_time = new Date(key).getTime();
                                                return {
                                                    command : array_serie.name,
                                                    time : date_time,
                                                    data : command[key]['tasa_cpu']
                                                }; 
                                            }
                                        })();
                                console.log(poll);
                                series[key].addPoint(poll.time,poll.data);
                            });*/                            
                        }, 1000);
                    }
                }
            },
            title: { text: '' },
            xAxis: { type: 'datetime', tickPixelInterval: 2000 },
            yAxis: { title: { text: '%' }, plotLines: [{ value: 0, width: 1, color: '#808080' }] },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%d-%m-%Y %H:%M:%S', this.x) +'%<br/>'+ 
                        Highcharts.numberFormat(this.y, 2)                        
                        ;
                }
            },
            legend: { enabled: false },
            exporting: { enabled: false },
            series: construct_series(poller(cmds),'tasa_cpu')
        });
    });    
});
</script>
<div id="page-wrapper">
	<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Salud de Sistema</h3>
      </div>
      <div class="panel-body">
        <div id="grafica-general" style="min-width: 310px; height: 200px; margin: 0 auto"></div>
      </div>
    </div>
	
</div>
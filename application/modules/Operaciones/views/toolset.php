<script>

STOOLS = {
	base_url : '<?php echo site_url(); ?>',
	getvalue: function(oid,ip,comm,timeout) {
		/*$.ajax({
            'url' : this.base_url + '/snmp/get_value_oid',
            'type' : 'POST', //the way you want to send data to your URL
            'data' : {objeto : oid, direccion : ip, tiempo : timeout},
            'success' : function(data){  if(data){ return data; }
            }
        });//*/
        return ([(new Date()).getTime(),Math.random()]);
    }
}

function poller(comms){
    var base_url = '<?php echo site_url();?>', output = null;
    $.ajax({
        'url' : base_url + 'index.php/Operaciones/extract_data/',
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

function dummy_series(cmds,number,interval)
{
    var series = [];
    $.each(cmds,function(key,value){
        series.push({
            name: value,
            enableMouseTracking: true,
            data: (function () {
                // generate an array of random data
                var data = [],
                    time = (new Date()).getTime(),
                    i;
        
                for (i = 0; i <= (number + 1); i += 1) {
                    data.push({
                        x: time - (i * interval),
                        y: 0
                    });
                }
                return data;
            }())
        });
    })
    return series;
}

function addplotpoints(obj,parameter)
{
    var series = [];
    $.each(obj,function( command, array_datetimes ) {
        series.push({
            point: (function(){
                var plot_points = [];
                $.each(array_datetimes,function(date_time,line){
                    var datetime = new Date(date_time).getTime();
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

function chart_init(value,interval,cmds,cmds_array,pixeltick,number)
{
    $('#grafica-'+value).highcharts({
        chart: { type: 'spline', animation: Highcharts.svg,  marginRight: 10 },
        title: { text: '' },
        xAxis: { 
            type: 'datetime',
            dateTimeLabelFormats: {
                second: '%H:%M:%S'
            },
            minRange: 500
        },
        yAxis: { 
            title: { text: '% ' + value }, 
            plotLines: [{ value: 0, width: 1, color: '#808080' }]},
        tooltip: {
            formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+/*
                    Highcharts.dateFormat('%d-%m-%Y %H:%M:%S', this.x) +'<br/>'+ */
                    Highcharts.numberFormat(this.y, 2) + "%"                       
                    ;
            }
        },
        legend: { enabled: false },
        exporting: { enabled: false },
        series: dummy_series(cmds_array,number)
    });
}

function chart_event(parameter_array,cmds)
{
    $.each(parameter_array,function(key,value){
        var series = $('#grafica-'+value).highcharts().series,
            new_series = addplotpoints(poller(cmds),value);
        $.each(series,function(key,value){
            var points = new_series[key].point[0];
            series[key].addPoint([points.x,points.y],true,true);
        });
    });
}

function ls()
{
    var base_url = '<?php echo site_url();?>', output = null;
    $.ajax({
        'url' : base_url + 'index.php/Operaciones/Operaciones/list_stats',
        type : 'POST',
        async : false,
        datatype: 'json',
        success : function(data){ output=data; }
    });
    return output; 
}

$(function () {
    $(document).ready(function() {
        Highcharts.setOptions({ global: { useUTC: false } });
        console.log(ls());
        /*var cmds = "apache,chrome", 
            cmds_array = cmds.split(','),
            parameter_array = ['tasa_cpu','tasa_ram','tasa_transferencia_dd'],
            interval = 2000, pixeltick = 50, dummy_number = 2;
        $.each(parameter_array,function(key,value){
            var div = '<div id="grafica-'+value+
                        '" style="min-width: 310px; height: 150px; margin: 0 auto"></div>';
            $('#procesos_status').append(div);
            var chart;
            chart_init(value,interval,cmds,cmds_array,pixeltick,dummy_number);                        
        });
        setInterval(function() { chart_event(parameter_array,cmds); }, interval);*/
    });    
});
</script>
<div id="page-wrapper">
	<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Procesos</h3>
      </div>
      <div class="panel-body" id='procesos_status'></div>
    </div>
	
</div>
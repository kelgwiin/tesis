<script>

$(function () {	
	
        $('#grafico1').highcharts({
    
            chart: {
                type: 'column'
            },
    
            title: {
                text: 'Gráfico de los Niveles Reales de Disponibilidad frente a los Niveles Acordados '
            },
    
            xAxis: {
                //NOMBRE DE LOS SERVICIOS
               	 
               	 <?php if(( $longitud )==1){ ?>
   					categories: ['<?php echo $servicios[1]; ?>']
                <?php } ?>
                <?php if(( $longitud )==2){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>']
                <?php } ?>
                <?php if(( $longitud )==3){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>']
                <?php } ?>
                <?php if(( $longitud )==4){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>']
                <?php } ?>
                <?php if(( $longitud )==5){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>']
                <?php } ?>
                <?php if(( $longitud )==6){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>']
                <?php } ?>
                <?php if(( $longitud )==7){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>']
                <?php } ?>
                <?php if(( $longitud )==8){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>']
                <?php } ?>
                <?php if(( $longitud )==9){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>', '<?php echo $servicios[9]; ?>']
                <?php } ?>
                <?php if(( $longitud )==10){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>', '<?php echo $servicios[9]; ?>', '<?php echo $servicios[10]; ?>']
                <?php } ?>
                
            },
    
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: ' % Porcentaje de Disponibilidad'
                }
            },
    
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
    
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
    		
            series: [{
                name: 'Acordado',
                 <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>],
                <?php } ?>
                
               <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?>],   					
                <?php } ?>
                
                <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>],
                <?php } ?>
                <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>, <?php echo $disponibilidad_acordado[4]; ?>],
                <?php } ?>
                <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>, <?php echo $disponibilidad_acordado[4]; ?>, <?php echo $disponibilidad_acordado[5]; ?>],
                <?php } ?>
                <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>, <?php echo $disponibilidad_acordado[4]; ?>, <?php echo $disponibilidad_acordado[5]; ?>, <?php echo $disponibilidad_acordado[6]; ?>],
                <?php } ?>
                <?php if(( $longitud )==7){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>, <?php echo $disponibilidad_acordado[4]; ?>, <?php echo $disponibilidad_acordado[5]; ?>, <?php echo $disponibilidad_acordado[6]; ?>, <?php echo $disponibilidad_acordado[7]; ?>],
                <?php } ?>
                <?php if(( $longitud )==8){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>, <?php echo $disponibilidad_acordado[4]; ?>, <?php echo $disponibilidad_acordado[5]; ?>, <?php echo $disponibilidad_acordado[6]; ?>, <?php echo $disponibilidad_acordado[7]; ?>, <?php echo $disponibilidad_real[8]; ?>],
                <?php } ?>
                <?php if(( $longitud )==9){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>, <?php echo $disponibilidad_acordado[4]; ?>, <?php echo $disponibilidad_acordado[5]; ?>, <?php echo $disponibilidad_acordado[6]; ?>, <?php echo $disponibilidad_acordado[7]; ?>, <?php echo $disponibilidad_acordado[8]; ?>, <?php echo $disponibilidad_acordado[9]; ?>],
                <?php } ?>
                <?php if(( $longitud )==10){ ?>	
   					data: [<?php echo $disponibilidad_acordado[1]; ?>, <?php echo $disponibilidad_acordado[2]; ?> , <?php echo $disponibilidad_acordado[3]; ?>, <?php echo $disponibilidad_acordado[4]; ?>, <?php echo $disponibilidad_acordado[5]; ?>, <?php echo $disponibilidad_acordado[6]; ?>, <?php echo $disponibilidad_acordado[7]; ?>, <?php echo $disponibilidad_acordado[8]; ?>, <?php echo $disponibilidad_acordado[9]; ?>, <?php echo $disponibilidad_acordado[10]; ?>],
                <?php } ?>
                stack: 'Acordado'
            }, {
                name: 'Real',
                
                <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>],
                <?php } ?>
                
               <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?>],   					
                <?php } ?>
                
                <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>],
                <?php } ?>
                <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>, <?php echo $disponibilidad_real[4]; ?>],
                <?php } ?>
                <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>, <?php echo $disponibilidad_real[4]; ?>, <?php echo $disponibilidad_real[5]; ?>],
                <?php } ?>
                <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>, <?php echo $disponibilidad_real[4]; ?>, <?php echo $disponibilidad_real[5]; ?>, <?php echo $disponibilidad_real[6]; ?>],
                <?php } ?>
                <?php if(( $longitud )==7){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>, <?php echo $disponibilidad_real[4]; ?>, <?php echo $disponibilidad_real[5]; ?>, <?php echo $disponibilidad_real[6]; ?>, <?php echo $disponibilidad_real[7]; ?>],
                <?php } ?>
                <?php if(( $longitud )==8){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>, <?php echo $disponibilidad_real[4]; ?>, <?php echo $disponibilidad_real[5]; ?>, <?php echo $disponibilidad_real[6]; ?>, <?php echo $disponibilidad_real[7]; ?>, <?php echo $disponibilidad_real[8]; ?>],
                <?php } ?>
                <?php if(( $longitud )==9){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>, <?php echo $disponibilidad_real[4]; ?>, <?php echo $disponibilidad_real[5]; ?>, <?php echo $disponibilidad_real[6]; ?>, <?php echo $disponibilidad_real[7]; ?>, <?php echo $disponibilidad_real[8]; ?>, <?php echo $disponibilidad_real[9]; ?>],
                <?php } ?>
                <?php if(( $longitud )==10){ ?>	
   					data: [<?php echo $disponibilidad_real[1]; ?>, <?php echo $disponibilidad_real[2]; ?> , <?php echo $disponibilidad_real[3]; ?>, <?php echo $disponibilidad_real[4]; ?>, <?php echo $disponibilidad_real[5]; ?>, <?php echo $disponibilidad_real[6]; ?>, <?php echo $disponibilidad_real[7]; ?>, <?php echo $disponibilidad_real[8]; ?>, <?php echo $disponibilidad_real[9]; ?>, <?php echo $disponibilidad_real[10]; ?>],
                <?php } ?> 
                stack: 'Real'
            }]
        });        
    });
    
$(function () {
        $('#grafico2').highcharts({
    
            chart: {
                type: 'column'
            },
    
            title: {
                text: 'Gráfico de los Niveles Reales de Fiabilidad frente a los Niveles Acordados '
            },
    
            xAxis: {
            	  //NOMBRE DE LOS SERVICIOS               	 
               	 <?php if(( $longitud )==1){ ?>
   					categories: ['<?php echo $servicios[1]; ?>']
                <?php } ?>
                <?php if(( $longitud )==2){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>']
                <?php } ?>
                <?php if(( $longitud )==3){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>']
                <?php } ?>
                <?php if(( $longitud )==4){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>']
                <?php } ?>
                <?php if(( $longitud )==5){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>']
                <?php } ?>
                <?php if(( $longitud )==6){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>']
                <?php } ?>
                <?php if(( $longitud )==7){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>']
                <?php } ?>
                <?php if(( $longitud )==8){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>']
                <?php } ?>
                <?php if(( $longitud )==9){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>', '<?php echo $servicios[9]; ?>']
                <?php } ?>
                <?php if(( $longitud )==10){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>', '<?php echo $servicios[9]; ?>', '<?php echo $servicios[10]; ?>']
                <?php } ?>            	
            },
    
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: ' Horas'
                }
            },
    
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
    
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
    
            series: [{
                name: 'Acordado',
                <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>],
                <?php } ?>
                
               <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?>],   					
                <?php } ?>
                
                <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>],
                <?php } ?>
                <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>, <?php echo $fiabilidad_acordado[4]; ?>],
                <?php } ?>
                <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>, <?php echo $fiabilidad_acordado[4]; ?>, <?php echo $fiabilidad_acordado[5]; ?>],
                <?php } ?>
                <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>, <?php echo $fiabilidad_acordado[4]; ?>, <?php echo $fiabilidad_acordado[5]; ?>, <?php echo $fiabilidad_acordado[6]; ?>],
                <?php } ?>
                <?php if(( $longitud )==7){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>, <?php echo $fiabilidad_acordado[4]; ?>, <?php echo $fiabilidad_acordado[5]; ?>, <?php echo $fiabilidad_acordado[6]; ?>, <?php echo $fiabilidad_acordado[7]; ?>],
                <?php } ?>
                <?php if(( $longitud )==8){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>, <?php echo $fiabilidad_acordado[4]; ?>, <?php echo $fiabilidad_acordado[5]; ?>, <?php echo $fiabilidad_acordado[6]; ?>, <?php echo $fiabilidad_acordado[7]; ?>, <?php echo $fiabilidad_acordado[8]; ?>],
                <?php } ?>
                <?php if(( $longitud )==9){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>, <?php echo $fiabilidad_acordado[4]; ?>, <?php echo $fiabilidad_acordado[5]; ?>, <?php echo $fiabilidad_acordado[6]; ?>, <?php echo $fiabilidad_acordado[7]; ?>, <?php echo $fiabilidad_acordado[8]; ?>, <?php echo $fiabilidad_acordado[9]; ?>],
                <?php } ?>
                <?php if(( $longitud )==10){ ?>	
   					data: [<?php echo $fiabilidad_acordado[1]; ?>, <?php echo $fiabilidad_acordado[2]; ?> , <?php echo $fiabilidad_acordado[3]; ?>, <?php echo $fiabilidad_acordado[4]; ?>, <?php echo $fiabilidad_acordado[5]; ?>, <?php echo $fiabilidad_acordado[6]; ?>, <?php echo $fiabilidad_acordado[7]; ?>, <?php echo $fiabilidad_acordado[8]; ?>, <?php echo $fiabilidad_acordado[9]; ?>, <?php echo $fiabilidad_acordado[10]; ?>],
                <?php } ?>
                stack: 'Acordado'
            }, {
                name: 'Real',
                
                <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>],
                <?php } ?>
                
               <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?>],   					
                <?php } ?>
                
                <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>],
                <?php } ?>
                <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>, <?php echo $fiabilidad_real[4]; ?>],
                <?php } ?>
                <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>, <?php echo $fiabilidad_real[4]; ?>, <?php echo $fiabilidad_real[5]; ?>],
                <?php } ?>
                <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>, <?php echo $fiabilidad_real[4]; ?>, <?php echo $fiabilidad_real[5]; ?>, <?php echo $fiabilidad_real[6]; ?>],
                <?php } ?>
                <?php if(( $longitud )==7){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>, <?php echo $fiabilidad_real[4]; ?>, <?php echo $fiabilidad_real[5]; ?>, <?php echo $fiabilidad_real[6]; ?>, <?php echo $fiabilidad_real[7]; ?>],
                <?php } ?>
                <?php if(( $longitud )==8){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>, <?php echo $fiabilidad_real[4]; ?>, <?php echo $fiabilidad_real[5]; ?>, <?php echo $fiabilidad_real[6]; ?>, <?php echo $fiabilidad_real[7]; ?>, <?php echo $fiabilidad_real[8]; ?>],
                <?php } ?>
                <?php if(( $longitud )==9){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>, <?php echo $fiabilidad_real[4]; ?>, <?php echo $fiabilidad_real[5]; ?>, <?php echo $fiabilidad_real[6]; ?>, <?php echo $fiabilidad_real[7]; ?>, <?php echo $fiabilidad_real[8]; ?>, <?php echo $fiabilidad_real[9]; ?>],
                <?php } ?>
                <?php if(( $longitud )==10){ ?>	
   					data: [<?php echo $fiabilidad_real[1]; ?>, <?php echo $fiabilidad_real[2]; ?> , <?php echo $fiabilidad_real[3]; ?>, <?php echo $fiabilidad_real[4]; ?>, <?php echo $fiabilidad_real[5]; ?>, <?php echo $fiabilidad_real[6]; ?>, <?php echo $fiabilidad_real[7]; ?>, <?php echo $fiabilidad_real[8]; ?>, <?php echo $fiabilidad_real[9]; ?>, <?php echo $fiabilidad_real[10]; ?>],
                <?php } ?> 
                
                stack: 'Real'
            }]
        });
    });

$(function () {
        $('#grafico3').highcharts({
    
            chart: {
                type: 'column'
            },
    
            title: {
                text: 'Gráfico de los Niveles Reales de Confiabilidad frente a los Niveles Acordados '
            },
    
            xAxis: {
            	  //NOMBRE DE LOS SERVICIOS
               	 
               	 <?php if(( $longitud )==1){ ?>
   					categories: ['<?php echo $servicios[1]; ?>']
                <?php } ?>
                <?php if(( $longitud )==2){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>']
                <?php } ?>
                <?php if(( $longitud )==3){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>']
                <?php } ?>
                <?php if(( $longitud )==4){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>']
                <?php } ?>
                <?php if(( $longitud )==5){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>']
                <?php } ?>
                <?php if(( $longitud )==6){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>']
                <?php } ?>
                <?php if(( $longitud )==7){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>']
                <?php } ?>
                <?php if(( $longitud )==8){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>']
                <?php } ?>
                <?php if(( $longitud )==9){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>', '<?php echo $servicios[9]; ?>']
                <?php } ?>
                <?php if(( $longitud )==10){ ?>
   					categories: ['<?php echo $servicios[1]; ?>' , '<?php echo $servicios[2]; ?>', '<?php echo $servicios[3]; ?>', '<?php echo $servicios[4]; ?>', '<?php echo $servicios[5]; ?>', '<?php echo $servicios[6]; ?>', '<?php echo $servicios[7]; ?>', '<?php echo $servicios[8]; ?>', '<?php echo $servicios[9]; ?>', '<?php echo $servicios[10]; ?>']
                <?php } ?>
            },
    
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: ' Horas'
                }
            },
    
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
    
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
    
            series: [{
                name: 'Acordado',
                
                <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>],
                <?php } ?>
                
               <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?>],   					
                <?php } ?>
                
                <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>],
                <?php } ?>
                <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>, <?php echo $confiabilidad_acordado[4]; ?>],
                <?php } ?>
                <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>, <?php echo $confiabilidad_acordado[4]; ?>, <?php echo $confiabilidad_acordado[5]; ?>],
                <?php } ?>
                <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>, <?php echo $confiabilidad_acordado[4]; ?>, <?php echo $confiabilidad_acordado[5]; ?>, <?php echo $confiabilidad_acordado[6]; ?>],
                <?php } ?>
                <?php if(( $longitud )==7){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>, <?php echo $confiabilidad_acordado[4]; ?>, <?php echo $confiabilidad_acordado[5]; ?>, <?php echo $confiabilidad_acordado[6]; ?>, <?php echo $confiabilidad_acordado[7]; ?>],
                <?php } ?>
                <?php if(( $longitud )==8){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>, <?php echo $confiabilidad_acordado[4]; ?>, <?php echo $confiabilidad_acordado[5]; ?>, <?php echo $confiabilidad_acordado[6]; ?>, <?php echo $confiabilidad_acordado[7]; ?>, <?php echo $confiabilidad_acordado[8]; ?>],
                <?php } ?>
                <?php if(( $longitud )==9){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>, <?php echo $confiabilidad_acordado[4]; ?>, <?php echo $confiabilidad_acordado[5]; ?>, <?php echo $confiabilidad_acordado[6]; ?>, <?php echo $confiabilidad_acordado[7]; ?>, <?php echo $confiabilidad_acordado[8]; ?>, <?php echo $confiabilidad_acordado[9]; ?>],
                <?php } ?>
                <?php if(( $longitud )==10){ ?>	
   					data: [<?php echo $confiabilidad_acordado[1]; ?>, <?php echo $confiabilidad_acordado[2]; ?> , <?php echo $confiabilidad_acordado[3]; ?>, <?php echo $confiabilidad_acordado[4]; ?>, <?php echo $confiabilidad_acordado[5]; ?>, <?php echo $confiabilidad_acordado[6]; ?>, <?php echo $confiabilidad_acordado[7]; ?>, <?php echo $confiabilidad_acordado[8]; ?>, <?php echo $confiabilidad_acordado[9]; ?>, <?php echo $confiabilidad_acordado[10]; ?>],
                <?php } ?>
                
                stack: 'Acordado'
            }, {
                name: 'Real',
                
                <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>],
                <?php } ?>
                
               <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?>],   					
                <?php } ?>
                
                <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>],
                <?php } ?>
                <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>, <?php echo $confiabilidad_real[4]; ?>],
                <?php } ?>
                <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>, <?php echo $confiabilidad_real[4]; ?>, <?php echo $confiabilidad_real[5]; ?>],
                <?php } ?>
                <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>, <?php echo $confiabilidad_real[4]; ?>, <?php echo $confiabilidad_real[5]; ?>, <?php echo $confiabilidad_real[6]; ?>],
                <?php } ?>
                <?php if(( $longitud )==7){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>, <?php echo $confiabilidad_real[4]; ?>, <?php echo $confiabilidad_real[5]; ?>, <?php echo $confiabilidad_real[6]; ?>, <?php echo $confiabilidad_real[7]; ?>],
                <?php } ?>
                <?php if(( $longitud )==8){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>, <?php echo $confiabilidad_real[4]; ?>, <?php echo $confiabilidad_real[5]; ?>, <?php echo $confiabilidad_real[6]; ?>, <?php echo $confiabilidad_real[7]; ?>, <?php echo $confiabilidad_real[8]; ?>],
                <?php } ?>
                <?php if(( $longitud )==9){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>, <?php echo $confiabilidad_real[4]; ?>, <?php echo $confiabilidad_real[5]; ?>, <?php echo $confiabilidad_real[6]; ?>, <?php echo $confiabilidad_real[7]; ?>, <?php echo $confiabilidad_real[8]; ?>, <?php echo $confiabilidad_real[9]; ?>],
                <?php } ?>
                <?php if(( $longitud )==10){ ?>	
   					data: [<?php echo $confiabilidad_real[1]; ?>, <?php echo $confiabilidad_real[2]; ?> , <?php echo $confiabilidad_real[3]; ?>, <?php echo $confiabilidad_real[4]; ?>, <?php echo $confiabilidad_real[5]; ?>, <?php echo $confiabilidad_real[6]; ?>, <?php echo $confiabilidad_real[7]; ?>, <?php echo $confiabilidad_real[8]; ?>, <?php echo $confiabilidad_real[9]; ?>, <?php echo $confiabilidad_real[10]; ?>],
                <?php } ?> 
                stack: 'Real'
            }]
        });
    });    
  
</script>
<div id="page-wrapper">
	<div class="panel panel-info">
		
		
		
      <div class="panel-heading">
        <h3 align="left" class="panel-title">Plan de Disponibilidad</h3>     
        	<div class ="col-md-12" align="right">
      			<button class="btn btn-danger" onclick="location.href='tesis/index.php/Disponibilidad/'" type="button">Atras</button>
       		</div>   
      </div><br>
      
       
       
       
	 <br>
        <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-file-o fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Opciones de Mejora</p>
                  </div>
                </div>
              </div>
              <a href="<?php echo base_url(); ?>index.php/Disponibilidad/Opcionesmejoras">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
              
       <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-file-o fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Logros en el Rendimiento</p>
                  </div>
                </div>
              </div>
             <a href="<?php echo base_url(); ?>index.php/Disponibilidad/Logrosrendimiento">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
       
         <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-file-o fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Oportunidades Tecnologicas</p>
                  </div>
                </div>
              </div>
             <a href="<?php echo base_url(); ?>index.php/Disponibilidad/Oportunidadestecnologicas">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
       
       <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-save fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-center">
                    <p class="announcement-text">Imprimir Plan de Disponibilidad</p>
                  </div>
                </div>
              </div>
              <a href="<?php echo base_url(); ?>index.php/Disponibilidad/ImprimirPlan">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Examinar
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          	         
       <div class="panel-body">	 
     
	<div id="grafico1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
   
	<div id="grafico2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
     
	<div id="grafico3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>  
	
    </div>	
</div>


            <div class="panel-body">
               <div id="barra" style="width: 667px; height: 1080px; margin: 0px auto;" ></div>           
            </div>
        

<script>

    $(document).ready(function () {
      
        $('#barra').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Los 35 sitios con  más consumo'
            },
            subtitle: {
                text: 'Gráfico de Barras'
            },
            xAxis: {
                categories: [
                    '<?php echo $datos[0]['domain'] ?>', '<?php echo $datos[1]['domain'] ?>', '<?php echo $datos[2]['domain'] ?>',
                    '<?php echo $datos[3]['domain'] ?>', '<?php echo $datos[4]['domain'] ?>', '<?php echo $datos[5]['domain'] ?>',
                    '<?php echo $datos[6]['domain'] ?>', '<?php echo $datos[7]['domain'] ?>', '<?php echo $datos[8]['domain'] ?>',
                    '<?php echo $datos[9]['domain'] ?>', '<?php echo $datos[10]['domain'] ?>', '<?php echo $datos[11]['domain'] ?>',
                    '<?php echo $datos[12]['domain'] ?>', '<?php echo $datos[13]['domain'] ?>', '<?php echo $datos[14]['domain'] ?>',
                    '<?php echo $datos[15]['domain'] ?>', '<?php echo $datos[16]['domain'] ?>', '<?php echo $datos[17]['domain'] ?>',
                    '<?php echo $datos[18]['domain'] ?>', '<?php echo $datos[19]['domain'] ?>', '<?php echo $datos[20]['domain'] ?>',
                    '<?php echo $datos[21]['domain'] ?>', '<?php echo $datos[22]['domain'] ?>', '<?php echo $datos[23]['domain'] ?>',
                    '<?php echo $datos[24]['domain'] ?>', '<?php echo $datos[25]['domain'] ?>', '<?php echo $datos[26]['domain'] ?>',
                    '<?php echo $datos[27]['domain'] ?>', '<?php echo $datos[28]['domain'] ?>', '<?php echo $datos[29]['domain'] ?>',
                    '<?php echo $datos[30]['domain'] ?>', '<?php echo $datos[31]['domain'] ?>', '<?php echo $datos[32]['domain'] ?>',
                    '<?php echo $datos[33]['domain'] ?>', '<?php echo $datos[34]['domain'] ?>', '<?php echo $datos[35]['domain'] ?>'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Dominios',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Mega Bytes'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -100,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Consumo',
                    data: [
<?php echo ($datos[0]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[1]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[2]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[3]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[4]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[5]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[6]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[7]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[8]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[9]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[10]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[11]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[12]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[13]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[14]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[15]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[16]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[17]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[18]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[19]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[20]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[21]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[22]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[23]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[24]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[25]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[26]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[27]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[28]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[29]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[30]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[31]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[32]['suma'] / 1024) / 1024 ?>,
<?php echo ($datos[33]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[34]['suma'] / 1024) / 1024 ?>, <?php echo ($datos[35]['suma'] / 1024) / 1024 ?>]
                }]
        });

    });
</script>



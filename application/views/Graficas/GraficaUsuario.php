<div class="row">      
    <div class="col-md-12">
        <div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Los 35 Usuarios con  más consumo (Gráfico de Barras)</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div >
                    <div id="barra" style="width: 967px; height: 1080px; margin: 0px auto;" ></div>
                </div>	
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        $('#barra').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Los 35 Usuarios con  más consumo'
            },
            subtitle: {
                text: 'Gráfico de Barras'
            },
            xAxis: {
                categories: [
                    '<?php echo $datos[0]['name'] ?>', '<?php echo $datos[1]['name'] ?>', '<?php echo $datos[2]['name'] ?>',
                    '<?php echo $datos[3]['name'] ?>', '<?php echo $datos[4]['name'] ?>', '<?php echo $datos[5]['name'] ?>',
                    '<?php echo $datos[6]['name'] ?>', '<?php echo $datos[7]['name'] ?>', '<?php echo $datos[8]['name'] ?>',
                    '<?php echo $datos[9]['name'] ?>', '<?php echo $datos[10]['name'] ?>', '<?php echo $datos[11]['name'] ?>',
                    '<?php echo $datos[12]['name'] ?>', '<?php echo $datos[13]['name'] ?>', '<?php echo $datos[14]['name'] ?>',
                    '<?php echo $datos[15]['name'] ?>', '<?php echo $datos[16]['name'] ?>', '<?php echo $datos[17]['name'] ?>',
                    '<?php echo $datos[18]['name'] ?>', '<?php echo $datos[19]['name'] ?>', '<?php echo $datos[20]['name'] ?>',
                    '<?php echo $datos[21]['name'] ?>', '<?php echo $datos[22]['name'] ?>', '<?php echo $datos[23]['name'] ?>',
                    '<?php echo $datos[24]['name'] ?>', '<?php echo $datos[25]['name'] ?>', '<?php echo $datos[26]['name'] ?>',
                    '<?php echo $datos[27]['name'] ?>', '<?php echo $datos[28]['name'] ?>', '<?php echo $datos[29]['name'] ?>',
                    '<?php echo $datos[30]['name'] ?>', '<?php echo $datos[31]['name'] ?>', '<?php echo $datos[32]['name'] ?>',
                    '<?php echo $datos[33]['name'] ?>', '<?php echo $datos[34]['name'] ?>', '<?php echo $datos[35]['name'] ?>'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Usuarios',
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



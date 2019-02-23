<div class="row">       
    <div class="col-md-6">
        <div class="panel panel-primary" data-collapsed="0">
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Los 10 sitios más visitados (Tabla)</div>
                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                        <tr align="center">           
                            <td><h4>Cantidad de Visitas</h4></td>           
                            <td><h4>Dominios</h4></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr align="center">                
                                <td><h5><?php echo $dato['cantidad']; ?></h5></td>                  
                                <td><h5><?php echo $dato['domain']; ?></h5></td>     
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>	
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Los 10 sitios más visitados (Gráfico de Barras)</div>
            </div>
            <!-- panel body -->
            <div class="panel-body" id="a">
                <div style="width: 100%   " >
                    <canvas id="canvas" height="1050" width="1000"></canvas>
                </div>	
            </div>
        </div>
    </div>
</div>
<script>

    var barChartData = {
        labels: ["<?php echo $datos[0]['domain'] ?>", "<?php echo $datos[1]['domain'] ?>", "<?php echo $datos[2]['domain'] ?>"
                    , "<?php echo $datos[3]['domain'] ?>", "<?php echo $datos[4]['domain'] ?>", "<?php echo $datos[5]['domain'] ?>",
            "<?php echo $datos[6]['domain'] ?>"],
        datasets: [
            {
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: ["<?php echo $datos[0]['cantidad'] ?>", "<?php echo $datos[1]['cantidad'] ?>", "<?php echo $datos[2]['cantidad'] ?>",
                    "<?php echo $datos[3]['cantidad'] ?>", "<?php echo $datos[4]['cantidad'] ?>", "<?php echo $datos[5]['cantidad'] ?>",
                    "<?php echo $datos[6]['cantidad'] ?>"]
            }
        ]

    }

    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
        responsive: true,
    });
    

</script>



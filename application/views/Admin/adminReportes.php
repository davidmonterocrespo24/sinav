<?php $this->load->view('Plantilla/Header'); ?>
<div class="row">       
    <div class="col-md-10">
        <div class="panel panel-primary" data-collapsed="0">
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Consumo</div>
                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>

                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->

                    <!-- panel body -->
                    <div class="panel-body" id="a">
                        <div style="width: 70%   " >
                            <canvas id="canvas" height="1050" width="1000"></canvas>

                        </div>	
                    </div>
                </div>
            </div> 

            <div class="col-md-2">
                <h2><?php echo $datos[0]['usuario']; ?></h2>
                <h4>Porciento Consumido</h4>
                <h5> <?php echo round(((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100, 1); ?>%
                </h5>

                <?php if (round(((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100, 1) > 100) { ?>                            
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar " aria-valuenow=" <?php echo ((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100; ?>" aria-valuemin="0" aria-valuemax="100" style="width:  <?php echo ((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100; ?>%;">
                        </div>

                    </div>
                <?php } ?>
                <?php if (round(((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100, 1) < 100) { ?>                            
                    <div class="progress">
                        <div class="progress-bar " role="progressbar" aria-valuenow=" <?php echo ((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100; ?>" aria-valuemin="0" aria-valuemax="100" style="width:  <?php echo ((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100; ?>%;">
                        </div>

                    </div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->
                    <div class="col-md-6">
                        <h3>Consumo semanal</h3>
                        <?php if (array_key_exists('usuario', $datos[0])) { ?>                            
                            <div class="alert alert-info">
                                <h4>Asignada <?php echo round(($cuota[0]['cuota'] / 1024) / 1024, 1); ?> Megas</h4>
                                <h4>Consumida <?php echo round(($cuota[0]['total'] / 1024) / 1024, 1); ?> Megas</h4>
                                <?php if (round(((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100, 1) < 100) { ?>                            
                                    <h4>Restante <?php echo (round(($cuota[0]['cuota'] / 1024) / 1024, 1) - round(($cuota[0]['total'] / 1024) / 1024, 1)); ?> Megas</h4>

                                <?php } ?>
                                <?php if (round(((round(($cuota[0]['total'] / 1024) / 1024, 1)) / (round(($cuota[0]['cuota'] / 1024) / 1024, 1))) * 100, 1) > 100) { ?>                            
                                    <h4 class="danger">Excedido <?php echo (round(($cuota[0]['cuota'] / 1024) / 1024, 1) - round(($cuota[0]['total'] / 1024) / 1024, 1)); ?> Megas</h4>

                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Consumo Mensual</h3>
                        <?php if (array_key_exists('usuario', $datos[0])) { ?>                            
                            <div class="alert alert-info">
                                <h4>Asignada <?php echo round((($cuota[0]['cuota'] / 1024) / 1024) * 5, 1); ?> Megas</h4>
                                <h4>Consumida <?php echo round(($cuota[0]['total30'] / 1024) / 1024, 1); ?> Megas</h4>
                                <?php if (round(((round(($cuota[0]['total30'] / 1024) / 1024, 1)) / (round((($cuota[0]['cuota'] / 1024) / 1024) * 5, 1))) * 100, 1) < 100) { ?>                            
                                    <h4>Restante <?php echo (round((($cuota[0]['cuota'] / 1024) / 1024) * 5, 1) - round(($cuota[0]['total30'] / 1024) / 1024, 1)); ?> Megas</h4>

                                <?php } ?>
                                <?php if (round(((round(($cuota[0]['total30'] / 1024) / 1024, 1)) / (round((($cuota[0]['cuota'] / 1024) / 1024) * 5, 1))) * 100, 1) > 100) { ?>                            
                                    <h4 class="danger">Excedido <?php echo (round(($cuota[0]['cuota'] / 1024) / 1024, 1) - round(($cuota[0]['total'] / 1024) / 1024, 1)); ?> Megas</h4>

                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr align="center">     
                                <?php if (array_key_exists('tiempo', $datos[0])) { ?> 
                                    <td><h4>Dias</h4></td> 
                                <?php } ?>
                                <?php if (array_key_exists('suma', $datos[0])) { ?> 
                                    <td><h4>Consumo</h4></td> 
                                <?php } ?>
                                <td> <h4>Detalles</h4> </td>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr align="center">                                
                                    <?php if (array_key_exists('tiempo', $dato)) { ?> 
                                        <td><h5><?php echo $dato['tiempo']; ?></h5></td>  
                                    <?php } ?>
                                    <?php if (array_key_exists('suma', $dato)) { ?> 
                                        <td>
                                            <h5><?php echo ($dato['suma'] / 1024) / 1024; ?> Mb</h5>
                                        </td>  
                                    <?php } ?>

                                    <td>
                                        <?php if ($dato['suma'] != 0) { ?> 
                                            <form action="datosPorDia" method="POST" >
                                                <input hidden="true" name="tiempo" id="tiempo"  value="<?php echo $dato['tiempo']; ?>" >
                                                <input type="submit" class="btn btn-primary" value="Detalles"/>
                                            </form>
                                        <?php } ?>
                                    </td>  
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-invert" data-collapsed="0"><!-- setting the attribute data-collapsed="1" will collapse the panel -->
                    <div   id="response"> </div>
                    <div  hidden="true"  id="aj"> </div>
                </div></div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        var barChartData = {
            labels: ["<?php echo $datos[7]['tiempo'] ?>", "<?php echo $datos[6]['tiempo'] ?>", "<?php echo $datos[5]['tiempo'] ?>"
                        , "<?php echo $datos[4]['tiempo'] ?>", "<?php echo $datos[3]['tiempo'] ?>", "<?php echo $datos[2]['tiempo'] ?>",
                "<?php echo $datos[1]['tiempo'] ?>", "<?php echo $datos[0]['tiempo'] ?>"],
            datasets: [
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: ["<?php echo ($datos[7]['suma'] / 1024) / 1024 ?>", "<?php echo ($datos[6]['suma'] / 1024) / 1024 ?>", "<?php echo ($datos[5]['suma'] / 1024) / 1024 ?>",
                        "<?php echo ($datos[4]['suma'] / 1024) / 1024 ?>", "<?php echo ($datos[3]['suma'] / 1024) / 1024 ?>", "<?php echo ($datos[2]['suma'] / 1024) / 1024 ?>",
                        "<?php echo ($datos[1]['suma'] / 1024) / 1024 ?>", "<?php echo ($datos[0]['suma'] / 1024) / 1024 ?>"]
                }
            ]

        };

        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive: true,
        });
    });

</script>
<script>
    function detalles(d) {
        alert(d);
    }

</script>


<?php $this->load->view('Plantilla/Footer'); ?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />
        <title>SINAV</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link  href="<?php echo base_url() ?>/recursos/css/bootstrap-cerulean.min.css" rel="stylesheet">

        <link href="<?php echo base_url() ?>/recursos/css/bootstrap-cerulean.min.css" rel="stylesheet">

        <link href="<?php echo base_url() ?>/recursos/css/charisma-app.css" rel="stylesheet">
        <link href='<?php echo base_url() ?>/recursos/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
        <link href='<?php echo base_url() ?>/recursos/bower_components/chosen/chosen.min.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/css/jquery.noty.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/css/noty_theme_default.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/css/elfinder.min.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/css/elfinder.theme.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/css/uploadify.css' rel='stylesheet'>
        <link href='<?php echo base_url() ?>/recursos/css/animate.min.css' rel='stylesheet'>

        <!-- jQuery -->
        <script src="<?php echo base_url() ?>/recursos/bower_components/jquery/jquery.min.js"></script>

    </head>
    <div class="ch-container">
        <div class="row">
            <!-- left menu starts -->

            <div  class="col-lg-12 col-sm-12">
                <div class="row " >
                    <div class="box col-md-12">
                        <div class="box-inner">
                            <div class="box-header well" data-original-title="">

                            </div>

                            <div class="row">       
                                <div class="col-md-12">
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
                                    var myNewChart;
                                    var data = [
                                        {
                                            value: 100,
                                            color: "#F7464A"
                                        }, {
                                            value: 50,
                                            color: "#E2EAE9"
                                        }
                                    ];

                                    var options = {
                                        animation: true,
                                        animationEasing: 'easeInOutQuart',
                                        animationSteps: 80
                                    };

//Get the context of the canvas element we want to select
                                    var ctx = document.getElementById("myChart")
                                            .getContext("2d");

                                    /*******************************************************/
                                    myNewChart = new Chart(ctx).Pie(data, options);
                                });

                            </script>
                            <script>
                                function detalles(d) {
                                    alert(d);
                                }

                            </script>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <canvas id="myChart"  ></canvas>
    <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>



    <!-- library for cookie management -->
    <!--script src="http://localhost/Test/recursos/js/jquery.cookie.js"></script>
    <!-- calender plugin -->
    <script src="<?php echo base_url() ?>/recursos/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- library for cookie management -->
    <script src="<?php echo base_url() ?>/recursos/js/jquery.cookie.js"></script>
    <!-- calender plugin -->
    <script src='<?php echo base_url() ?>/recursos/bower_components/moment/min/moment.min.js'></script>
    <script src='<?php echo base_url() ?>/recursos/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
    <!-- data table plugin -->
    <script src='<?php echo base_url() ?>/recursos/js/jquery.dataTables.min.js'></script>

    <!-- select or dropdown enhancer -->
    <script src="<?php echo base_url() ?>/recursos/bower_components/chosen/chosen.jquery.min.js"></script>
    <!-- plugin for gallery image view -->
    <script src="<?php echo base_url() ?>/recursos/bower_components/colorbox/jquery.colorbox-min.js"></script>
    <!-- notification plugin -->
    <script src="<?php echo base_url() ?>/recursos/js/jquery.noty.js"></script>
    <!-- library for making tables responsive -->
    <script src="<?php echo base_url() ?>/recursos/bower_components/responsive-tables/responsive-tables.js"></script>
    <!-- tour plugin -->
    <script src="<?php echo base_url() ?>/recursos/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
    <!-- star rating plugin -->
    <script src="<?php echo base_url() ?>/recursos/js/jquery.raty.min.js"></script>
    <!-- for iOS style toggle switch -->
    <script src="<?php echo base_url() ?>/recursos/js/jquery.iphone.toggle.js"></script>
    <!-- autogrowing textarea plugin -->
    <script src="<?php echo base_url() ?>/recursos/js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="<?php echo base_url() ?>/recursos/js/jquery.uploadify-3.1.min.js"></script>
    <!-- history.js for cross-browser state change on ajax -->
    <script src="<?php echo base_url() ?>/recursos/js/jquery.history.js"></script>
    <!-- application script for Charisma demo -->
    <script src="<?php echo base_url() ?>/recursos/js/charisma.js"></script>


    <script src="<?php echo base_url() ?>/neon/assets/js/Chart.js"></script>

</body>
</html>
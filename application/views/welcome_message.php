
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
            ===
            This comment should NOT be removed.
    
            Charisma v2.0.0
    
            Copyright 2012-2014 Muhammad Usman
            Licensed under the Apache License v2.0
            http://www.apache.org/licenses/LICENSE-2.0
    
            http://usman.it
            http://twitter.com/halalit_usman
            ===
        -->
        <meta charset="utf-8">
        <title>Sta2UO</title>


        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link  href="<?php echo base_url() ?>/recursos/css/bootstrap-cerulean.min.css" rel="stylesheet">

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
        <link href='<?php echo base_url() ?>/recursos/css/style.css' rel='stylesheet'>


        <script src="<?php echo base_url() ?>/recursos/bower_components/jquery/jquery.min.js"></script>

        <link rel="shortcut icon" href="img/favicon.ico">

    </head>

    <body>
        <div class="ch-container">
            <div class="row">

                <div class="row">
                    <div class="col-md-12 center login-header">
                        <h2>Bienvenidos al SINAV</h2>
                    </div>
                    <!--/span-->
                </div><!--/row-->

                <div class="row">
                    <div class="well col-md-5 center login-box">
                        <div class="alert alert-info">
                            Ingrese sus datos
                        </div>
                        
                        <h3 class="danger"><?php echo $error ?></h3>
                        <form class="form-horizontal" name="login_form" id="login_form" action="<?php echo base_url() ?>index.php/Welcome/login" method="post">
                            <fieldset>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                    <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Usuario" value="<?php echo $nombre ?>">
                                </div>
                                <div class="clearfix"></div><br>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                    <input name="contrasena" id="contrasena" type="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="clearfix"></div>

                                <div class="clearfix"></div>

                                <p class="center col-md-5">
                                   
                                    <input type="submit" class="btn btn-primary"  name="aceptar" id="aceptar" value="Aceptar"/>
                                    
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/Welcome/cambiarContrasena" > Cambiar Contraseña</a>
                                 Activar o Cambiar contrase&nacute;a
                                </p>
                            </fieldset>
                        </form>
                    </div>
                    <!--/span-->
                </div><!--/row-->
            </div><!--/fluid-row-->

        </div><!--/.fluid-container-->

        <script type="text/javascript">

            function reloadCaptcha()
            {
                $('#siimage').prop('src', "scripts/securimage_show.php?sid=" + Math.random());
            }

            $(document).ready(function() {
                // Handler for .ready() called.
                $("#enviar").click(function(event) {
                    alert('wr');
                    var ct_captcha = $('#ct_captcha').val();
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Welcome/process_si_contact_form", type: 'POST', data: {
                            ct_captcha: ct_captcha},
                        success: function(result) {
                            alert(result);
                        }});
                });
            });

        </script>


        <script src="<?php echo base_url() ?>/recursos/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>/recursos/js/charisma.js"></script>

        <!-- library for cookie management -->
        <!--script src="http://localhost/Test/recursos/js/jquery.cookie.js"></script>
        <!-- calender plugin -->

        <script src='<?php echo base_url() ?>/recursos/bower_components/moment/min/moment.min.js'></script>
        <!-- data table plugin -->
        <script src='<?php echo base_url() ?>/js/jquery.dataTables.min.js'></script>

        <!-- select or dropdown enhancer -->
        <script src="<?php echo base_url() ?>/recursos/bower_components/chosen/chosen.jquery.min.js"></script>
        <!-- plugin for gallery image view -->
        <script src="<?php echo base_url() ?>/recursos/bower_components/colorbox/jquery.colorbox-min.js"></script>
        <!-- notification plugin -->
        <script src="<?php echo base_url() ?>/recursos/js/jquery.noty.js"></script>
        <!-- library for making tables responsive -->
        <script src="<?php echo base_url() ?>/recursos/bower_components/responsive-tables/responsive-tables.js"></script>
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

        <script src="<?php echo base_url() ?>/neon/assets/highcharts/js/jquery-1.9.1.min.js"></script>



    </body>
</html>

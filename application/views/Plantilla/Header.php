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
    <body >

        <div class="navbar navbar-default" role="navigation">
            <div class="navbar-inner">
                <button type="button" class="navbar-toggle pull-left animated flip">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" > 
                    
                    <span class="span4">SINAV</span></a>
                  <div class="btn-group pull-right">

                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $nombre ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">    
                    <li><a href="<?php echo base_url() ?>/index.php/Welcome/cerrarSesion">Logout</a></li>
                </ul>
            </div>
            </div>
          
        </div>
        <div class="ch-container">
            <div class="row">
                <!-- left menu starts -->

                <div  class="col-lg-12 col-sm-12">
                    <div class="row " >
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">

                                </div>


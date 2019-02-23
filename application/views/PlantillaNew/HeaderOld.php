<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />
        <title>Metricas</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>/neon/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/neon/assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="<?php echo base_url() ?>/neon/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/neon/assets/css/neon-core.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/neon/assets/css/neon-theme.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/neon/assets/css/neon-forms.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/neon/assets/css/custom.css">
        <script src="<?php echo base_url() ?>/neon/assets/js/jquery-1.11.0.min.js"></script>

        <script src="<?php echo base_url() ?>/neon/assets/js/daterangepicker/moment.min.js"></script>
        <script src="<?php echo base_url() ?>/neon/assets/js/daterangepicker/daterangepicker.js"></script>
    </head>
    <body class="page-body  page-fade" data-url="http://neon.dev">
        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
            <div class="sidebar-menu">    
                <header class="logo-env">
                    <!-- logo -->         
                    <div class="logo">
                        <a href="index.html">
                            <h2><img src="<?php echo base_url() ?>/img/sta2uo.png" width="210" alt="210"  /></h2>               

                        </a>
                    </div>
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation">
                            <i class="entypo-menu"></i>
                        </a>
                    </div>
                </header>
                <ul id="main-menu" class="">
                    <li>
                        <a href="index.html">
                            <i class="entypo-gauge"></i>
                            <span>Logs</span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?php echo base_url() ?>index.php/full_log_10">
                                    <span>Full Log 10</span>
                                </a>
                            </li>                          
                        </ul>

                        <ul>
                            <li>
                                <a href="<?php echo base_url() ?>index.php/ReportesGraficas/MasVisitadas">
                                    <span>Los 10 sitios más visitados</span>
                                </a>
                            </li>                          
                        </ul>

                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-flow-tree"></i>
                            <span>Red</span>
                        </a>
                        <ul>
                            <a href="#">
                                <i class="entypo-gauge"></i>
                                <span>Filtrado por Red</span>
                            </a>
                            <label for="usuario" class="col-sm-3 control-label">Usuario</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="usuariored" name="usuario" type="Text" />
                            </div>

                            <label class="col-sm-3 control-label">Red</label>
                            <div class="col-sm-10">              
                                <form role="form" class="form-horizontal form-groups-bordered">                           
                                    <select name="red" id="redred" class="select2" data-allow-clear="true" data-placeholder="Seleccione una Red">
                                        <option></option>
                                        <optgroup label="Redes">
                                            <?php foreach ($redes as $red): ?>
                                            <div id="resultado" name="resultado"></div>
                                            <option  value="<?php echo $red['id']; ?>"> <?php echo $red['base']; ?></option>
                                        <?php endforeach; ?> 
                                        </optgroup>
                                    </select>                                              
                                </form>
                            </div>

                            <label for="computadora" class="col-sm-3 control-label">Computadora</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="computadorared" name="computadora" type="text" />
                            </div>

                            <label class="col-sm-3 control-label">Dia</label>
                            <div class="col-sm-10">
                                <div   class="daterange daterange-inline add-ranges" data-format=" D MMMM YYYY" data-start-date="March 18, 2016" data-end-date="April 3, 2016">
                                    <div id="diared" value="February 26, 2016 - February 26, 2016">
                                        <input class="form-control"  />
                                    </div>
                                </div>

                            </div>
                            <label class="col-sm-3 control-label">Dominio</label>
                            <div class="col-sm-10"  >                            
                                <input class="form-control" id="dominiored" name="dominiored" type="text" />
                            </div>   
                            <label class="col-sm-3 control-label"> </label>
                            <div class="col-sm-10">   
                                <div class="col-sm-offset-3 col-sm-10">
                                    <button type="submit" id="filtrarred" class="btn btn-default filtrar">Filtrar</button>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-gauge"></i>
                            <span>Dominio</span>
                        </a>
                        <ul>
                            <a href="#">
                                <i class="entypo-gauge"></i>
                                <span>Filtrado por Dominio</span>
                            </a>
                            <label for="usuario" class="col-sm-3 control-label">Usuario</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="usuariodominio" name="usuario" type="Text" />
                            </div>

                            <label class="col-sm-3 control-label">Red</label>
                            <div class="col-sm-10">              
                                <form role="form" class="form-horizontal form-groups-bordered">                           
                                    <select name="red" id="reddominio" class="select2" data-allow-clear="true" data-placeholder="Seleccione una Red">
                                        <option></option>
                                        <optgroup label="Redes">
                                            <?php foreach ($redes as $red): ?>
                                            <div id="resultado" name="resultado"></div>
                                            <option  value="<?php echo $red['id']; ?>"> <?php echo $red['base']; ?></option>
                                        <?php endforeach; ?> 
                                        </optgroup>
                                    </select>                                              
                                </form>
                            </div>

                            <label for="computadora" class="col-sm-3 control-label">Computadora</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="computadoradominio" name="computadora" type="text" />
                            </div>

                            <label class="col-sm-3 control-label">Dia</label>
                            <div class="col-sm-10">
                                <div   class="daterange daterange-inline add-ranges" data-format=" D MMMM YYYY" data-start-date="March 18, 2016" data-end-date="April 3, 2016">
                                    <div id="diadominio" value="February 26, 2016 - February 26, 2016">
                                        <input class="form-control"  />
                                    </div>
                                </div>

                            </div>
                            <label class="col-sm-3 control-label">Dominio</label>
                            <div class="col-sm-10"  >                            
                                <input class="form-control" id="dominiodominio" name="dominiocomputadora" type="text" />
                            </div>    
                            <label class="col-sm-3 control-label"> </label>
                            <div class="col-sm-10">   
                                <div class="col-sm-offset-3 col-sm-10">
                                    <button type="submit" id="filtrardominio" class="btn btn-default filtrar">Filtrar</button>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-user"></i>
                            <span>Usuario</span>
                        </a>
                        <ul>
                            <a href="#">
                                <i class="entypo-gauge"></i>
                                <span>Filtrado por Usuario</span>
                            </a>
                            <label for="usuario" class="col-sm-3 control-label">Usuario</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="usuariousuario" name="usuariousuario" type="Text" />
                            </div>

                            <label class="col-sm-3 control-label">Red</label>
                            <div class="col-sm-10">              
                                <form role="form" class="form-horizontal form-groups-bordered">                           
                                    <select name="redusuario" id="redusuario" class="select2" data-allow-clear="true" data-placeholder="Seleccione una Red">
                                        <option></option>
                                        <optgroup label="Redes">
                                            <?php foreach ($redes as $red): ?>
                                            <div id="resultado" name="resultado"></div>
                                            <option  value="<?php echo $red['id']; ?>"> <?php echo $red['base']; ?></option>
                                        <?php endforeach; ?> 
                                        </optgroup>
                                    </select>                                              
                                </form>
                            </div>

                            <label for="computadora" class="col-sm-3 control-label">Computadora</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="computadorausuario" name="computadorausuario" type="text" />
                            </div>

                            <label class="col-sm-3 control-label">Dia</label>
                            <div class="col-sm-10">
                                <div   class="daterange daterange-inline add-ranges" data-format=" D MMMM YYYY" data-start-date="March 18, 2016" data-end-date="April 3, 2016">
                                    <div id="diausuario" value="February 26, 2016 - February 26, 2016">
                                        <input class="form-control"  />
                                    </div>
                                </div>

                            </div>
                            <label class="col-sm-3 control-label">Dominio</label>
                            <div class="col-sm-10"  >                            
                                <input class="form-control" id="dominiousuario" name="dominiocomputadora" type="text" />
                            </div>  
                            <label class="col-sm-3 control-label"> </label>
                            <div class="col-sm-10">   
                                <div class="col-sm-offset-3 col-sm-10">
                                    <button type="submit" id="filtrarusuario" class="btn btn-default filtrar">Filtrar</button>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="entypo-gauge"></i>
                            <span>Computadora</span>
                        </a>
                        <ul>
                            <a href="#">
                                <i class="entypo-gauge"></i>
                                <span>Filtrado por Computadoras</span>
                            </a>
                            <label for="usuario" class="col-sm-3 control-label">Usuario</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="usuariocomputadora" name="usuariocomputadora" type="Text" />
                            </div>

                            <label class="col-sm-3 control-label">Red</label>
                            <div class="col-sm-10">              
                                <form role="form" class="form-horizontal form-groups-bordered">                           
                                    <select name="redcomputadora" id="redcomputadora" class="select2" data-allow-clear="true" data-placeholder="Seleccione una Red">
                                        <option></option>
                                        <optgroup label="Redes">
                                            <?php foreach ($redes as $red): ?>
                                            <div id="resultado" name="resultado"></div>
                                            <option  value="<?php echo $red['id']; ?>"> <?php echo $red['base']; ?></option>
                                        <?php endforeach; ?> 
                                        </optgroup>
                                    </select>                                              
                                </form>
                            </div>

                            <label for="computadora" class="col-sm-3 control-label">Computadora</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="computadoracomputadora" name="computadora" type="text" />
                            </div>
                            <label class="col-sm-3 control-label">Dia</label>
                            <div class="col-sm-10">
                                <div   class="daterange daterange-inline add-ranges" data-format=" D MMMM YYYY" data-start-date="March 18, 2016" data-end-date="April 3, 2016">
                                    <div id="diacomputadora" value="February 26, 2016 - February 26, 2016">
                                        <input id="diacomputadorainput" class="form-control"  />
                                    </div>
                                </div>
                            </div>
                            <label class="col-sm-3 control-label">Dominio</label>
                            <div class="col-sm-10"  >                            
                                <input class="form-control" id="dominiocomputadora" name="dominiocomputadora" type="text" />
                            </div>  
                            <label class="col-sm-3 control-label"> </label>
                            <div class="col-sm-10">   
                                <div class="col-sm-offset-3 col-sm-10">
                                    <button type="submit" id="filtrarcomputadora" name="filtrarcomputadora" class="btn btn-default filtrar">Filtrar</button>
                                </div>
                            </div>
                        </ul>
                    </li>                 
                    <li>
                        <div></div>
                    </li>
                    <br/>
                    <br /> <br />
                </ul>
            </div>	
            <div class="main-content">

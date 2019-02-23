
</div>
</div>

<div class="box col-md-3">
    <div class="box-inner">
        <div class="box-header well">
            <h2>Filtrado</h2>

            <div class="box-icon">
                <a href="#" class="btn btn-close btn-round btn-default"><i
                        class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">          
            <form role="form">
                <div class="form-group">
                    <label class="control-label">Criterio</label>
                    <span aria-owns="" aria-expanded="false" aria-haspopup="true" aria-autocomplete="list" role="combobox" class="selectboxit-container selectboxit-container" id="">
                        <select id="criterio" style="display: block; visibility: visible; width: 398px; height: 30px; opacity: 0; position: absolute; top: 0px; left: 0px;  z-index: 999999; padding: 0px;" name="test" class="selectboxit visible" data-native="true" >
                            <option value="0"></option>
                            <option value="1">Dominio</option>
                            <option value="2">Usuario</option>
                            <option value="3">Computadora</option>
                            <option value="4">Red</option>
                        </select></span>
                </div>
                <div class="form-group">
                    <label class="control-label">Dia</label>
                    <div >    
                        <div   class="daterange daterange-inline add-ranges" data-format=" D MMMM YYYY" data-start-date="March 18, 2016" data-end-date="April 3, 2016">
                            <div id="diared" value="February 26, 2016 - February 26, 2016">
                                <input class="form-control"  />
                            </div>                  
                        </div>
                    </div>
                </div>
                <div class="form-group">

                    <label class="control-label">Red</label>
                    <div >              
                        <form role="form" class="form-horizontal form-groups-bordered">                           
                            <select name="red" id="red" class="select2" data-allow-clear="true" data-placeholder="Seleccione una Red">
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
                </div>
                <div class="form-group">

                    <label for="usuario" class="control-label">Usuario</label>
                    <div >
                        <input class="form-control" id="usuario" name="usuario" type="Text" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="computadora" class=" control-label">Computadora</label>
                    <div>
                        <input class="form-control" id="computadora" name="computadora" type="text" />
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Dominio</label>
                    <div   >                            
                        <input class="form-control" id="dominio" name="dominio" type="text" />
                    </div>
                </div>
                <div class="form-group"> <label class=" control-label"> </label>
                    <div >   
                        <div class="col-sm-offset-3 ">
                            <button type="submit" id="filtrar" class="btn btn-primary filtrar">Filtrar</button>
                        </div>
                    </div>
                </div>                  
            </form>
        </div>
    </div>
</div> 
<footer class="main">
    &copy; 2016 <strong>CORPUS</strong> David Montero Crespo <a href="http://laborator.co" target="_blank">UO</a>
</footer>	


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


<script src="<?php echo base_url() ?>/neon/assets/highcharts/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>/neon/assets/js/Chart.js"></script>

</body>
</html>
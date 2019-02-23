<?php $this->load->view('Plantilla/Header'); ?>
<div class="row">
    <div class="box col-md-12">

        <div class="box-inner">
            <a class="btn btn-primary" href="<?php echo base_url() ?>/index.php/Usuario/consumoUsuario">Volver a la P&aacute;gina Principal</a>
            <br>                  <br>

            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Datos de Navegaci&oacute;n del Usuario del D&iacute;a <?php echo $dia; ?></h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">

                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>IP</th>
                            <th>URL</th>
                            <th>Consumo</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php foreach ($navegacion as $nav): ?>     
                            <tr>       
                                <td class="center"><?php echo $nav['client_src_ip_addr']; ?></td>
                                <td class="center"> <?php echo $nav['request_url']; ?></td>
                                <td class="center"><?php echo $nav['reply_size']; ?> Bytes</td>

                            </tr>
                        <?php endforeach ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

<?php $this->load->view('Plantilla/Footer'); ?>
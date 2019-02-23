<?php $this->load->view('Plantilla/Header'); ?>
<div class="row" class="hide" id="loading" >       
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Cargando</div>

            </div>
            <!-- panel body -->
            <div class="panel-body">
                <h2><img src="<?php echo base_url() ?>/neon/assets/images/loader-1.gif" width="50" alt="50"  /></h2>               
            </div>
        </div>
    </div> </div>   
<div  hidden="true"  id="response"> </div>
<div  hidden="true"  id="aj"> </div>

<script>
    $(document).ready(function() {
        $(document).ajaxStart(function() {
            $("#loading").fadeIn(500);
        }).ajaxStop(function() {
            $("#loading").fadeOut(200);
        });
        var url = '<?php echo base_url() ?>/index.php/<?php echo $url ?>';
                $.get(url, function(data) {
                    $("#response").fadeIn(500);
                    $("#response").html(data);
                });

                if (url != window.location) {
                    window.history.pushState({path: url}, 'about Us', url);
                }

            });
</script>
<script>

    $(document).ready(function() {
        //////////////////////////////////////////////
        /////////////FILTRADO RED/////////////////////
        //////////////////////////////////////////////
        $("#filtrarred").click(function() {
            $("#response").html('');
            usuario = $("#usuariored").val();
            red = $("#redred").val();
            computadora = $("#computadorared").val();
            dominio = $("#dominiored").val();
            dia = $("#diaredinput").val();
            arreg = dia.split('-');
            dia1 = arreg[0];
            dia2 = arreg[1];
            if (computadora == "" && usuario == "" && red == "" && dominio == "" && dia != "") {
               
                $.ajax({url: "<?php echo base_url() ?>/index.php/Red/com_mas_consumo", type: 'POST', data: {                        
                        dia1: dia1,
                        dia2: dia2},
                    success: function(result) {
                        $("#response").html(result);
                    }});
            } else {
                if ((usuario != "" || dominio != "" || computadora != "") && dia != "" && red != "") {
                   
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Red/consumo_criterios", type: 'POST', data: {
                            usuario: usuario,
                            red: red,
                            computadora: computadora,
                            dominio: dominio,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
                else {
                   
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Red/filtrado_red", type: 'POST', data: {
//                        usuario: usuario,
                            red: red,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
            }
        });
        //////////////////////////////////////////////
        /////////////FILTRADO DOMINIO/////////////////
        //////////////////////////////////////////////
        $("#filtrardominio").click(function() {
            $("#response").html('');
            usuario = $("#usuariodominio").val();
            red = $("#reddominio").val();
            computadora = $("#computadoradominio").val();
            dominio = $("#dominiodominio").val();
            dia = $("#diadominioinput").val();
            arreg = dia.split('-');
            dia1 = arreg[0];
            dia2 = arreg[1];

            if (computadora == "" && usuario == "" && red == "" && dominio == "" && dia != "") {
              
                $.ajax({url: "<?php echo base_url() ?>/index.php/Dominio/com_mas_consumo", type: 'POST', data: {
                        //    usuario: usuario,
                        //    red: red,
                        //    computadora: computadora,
                        //    dominio: dominio,
                        dia1: dia1,
                        dia2: dia2},
                    success: function(result) {
                        $("#response").html(result);
                    }});
            } else {
                if ((usuario != "" || red != "" || computadora != "") && dia != "" &&dominio != "") {
                  
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Dominio/consumo_criterios", type: 'POST', data: {
                            usuario: usuario,
                            red: red,
                            computadora: computadora,
                            dominio: dominio,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
                else {
                   
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Dominio/filtrado_dominio", type: 'POST', data: {
//                        usuario: usuario,
                            red: red,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
            }
        });

        //////////////////////////////////////////////
        //////////////FILTRADO USUARIO////////////////
        //////////////////////////////////////////////
        $("#filtrarusuario").click(function() {
            $("#response").html('');
            usuario = $("#usuariousuario").val();
            red = $("#redusuario").val();
            computadora = $("#computadorausuario").val();
            dominio = $("#dominiousuario").val();
            dia = $("#diausuarioinput").val();
            arreg = dia.split('-');
            dia1 = arreg[0];
            dia2 = arreg[1];

            if (computadora == "" && usuario == "" && red == "" && dominio == "" && dia != "") {
                alert("Holamssfd");
                $.ajax({url: "<?php echo base_url() ?>/index.php/Usuario/com_mas_consumo", type: 'POST', data: {
                      
                        dia1: dia1,
                        dia2: dia2},
                    success: function(result) {
                        $("#response").html(result);
                    }});
            } else {
                if ((computadora != "" || dominio != "" || red != "") && dia != "" && usuario != "") {
                  
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Usuario/consumo_criterios", type: 'POST', data: {
                            usuario: usuario,
                            red: red,
                            computadora: computadora,
                            dominio: dominio,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
                else {
                  
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Usuario/filtrado_usuario", type: 'POST', data: {
//                        usuario: usuario,
//                        red: red,
                            usuario: usuario,
                            //  dominio: dominio,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
            }
        });


        //////////////////////////////////////////////
        /////////////FILTRADO COMPUTADORA/////////////
        //////////////////////////////////////////////
        $("#filtrarcomputadora").click(function() {
            $("#response").html('');
            usuario = $("#usuariocomputadora").val();
            red = $("#redcomputadora").val();
            computadora = $("#computadoracomputadora").val();
            dominio = $("#dominiocomputadora").val();
            dia = $("#diacomputadorainput").val();
            arreg = dia.split('-');
            dia1 = arreg[0];
            dia2 = arreg[1];

            if (computadora == "" && usuario == "" && red == "" && dominio == "" && dia != "") {
              
                $.ajax({url: "<?php echo base_url() ?>/index.php/Computadora/com_mas_consumo", type: 'POST', data: {
                        dia1: dia1,
                        dia2: dia2},
                    success: function(result) {
                        $("#response").html(result);
                    }});
            } else {
                if ((usuario != "" || dominio != "" || red != "") && dia != "" && computadora != "") {
                   
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Computadora/consumo_criterios", type: 'POST', data: {
                            usuario: usuario,
                            red: red,
                            computadora: computadora,
                            dominio: dominio,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
                else {
                  
                    $.ajax({url: "<?php echo base_url() ?>/index.php/Computadora/filtrado_computadora", type: 'POST', data: {
                            computadora: computadora,
                            dia1: dia1,
                            dia2: dia2},
                        success: function(result) {
                            $("#response").html(result);
                        }});
                }
            }
        });

    });

</script>

<?php $this->load->view('Plantilla/Footer'); ?>
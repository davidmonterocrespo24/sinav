<?php $this->load->view('Plantilla/Header'); ?>
 <div  id="mens"></div>

<script>
    $(document).ready(function() {
        $.ajax({url: "<?php echo base_url() ?>/index.php/ReportesGraficas/ajax", type: 'POST', data: {
        cargar: "ok"},
                success: function(result) {
                    $("#mens").fadeIn(5000);
                    $("#mens").html(result);
                   }});
    });

</script>

<?php $this->load->view('Plantilla/Footer'); ?>
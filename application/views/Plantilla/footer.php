<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Validación -->    
    <script src='<?=base_url()?>assets/js/validarRut.js'></script>
<!--    <script src='<?=base_url()?>assets/js/validaciones.js'></script>  
    <script src='<?=base_url()?>assets/js/calculo.js?v=1'></script>-->
    <script>
        base_url = '<?=base_url()?>';      
        $('#btnSubmit').addClass('animated bounceIn');  
       
    </script>      
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <h3 class="text-center mt-3">Formulario Enviado!</h3>
    
    <div class="d-table ml-auto mr-auto minw">
         <div class="card mt-5">
             <div class="card-body">
                
                 <?php if ($valor === '1'):?> 
                 <p class="text-center s"><?=$nombre?> Tiene <?=$anios?> Años </p>
                 <?php else: ?>
                  <p class="text-center s"><?=$nombre?> Nació un día <?=$dia?> </p>
                 <?php endif; ?>
                 
             </div>
             <div class="d-table ml-auto mr-auto">
                <p><?php echo anchor('Home', 'Volver!'); ?></p>
             </div>
         </div>
    </div>



</body>
</html>

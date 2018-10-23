<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <div class="d-table ml-auto mr-auto minw">
        <div class="card mt-5">
            <div class="card-body">                
                    <!-- form start -->
                    <?php echo form_open('Home/validar'); ?>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name='nombre' aria-describedby="mNombre"
                            value="<?=set_value('nombre');?>" placeholder="Ingrese Nombre" >
                        <median class="form-text font-weight-bold text-danger text-center">  
                            <?=form_error('nombre');?>
                        </median>
                    </div>
                    <div class="form-group">
                        <label for="rut">RUT</label>
                        <input type="text" class="form-control" oninput="checkRut(this)" id="rut" name='rut' aria-describedby="infoRut"
                               value="<?=set_value('rut');?>" placeholder="Ingrese RUT" >                        
                        <median id='mRut' class="form-text font-weight-bold text-danger text-center">
                             <?php echo form_error('rut'); ?>
                        </median>
                    </div>
                    <div class="form-group">
                        <label for="nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="nacimiento" name='nacimiento' 
                               value="<?=set_value('nacimiento');?>" aria-describedby="mNacimiento"  >
                        <median class="form-text font-weight-bold text-danger text-center">
                             <?=form_error('nacimiento');?>
                        </median>
                    </div>
                    <div class="input-group mb-3 form-group">                       
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="calculo">Cálculo</label>
                        </div>                        
                        <select class="custom-select" id="calculo" name='calculo'>
                            <option selected value="">Elegir...</option>
                            <option value="1" <?=set_select('calculo','1')?>>Cálcular Edad</option>
                            <option value="2" <?=set_select('calculo','2')?>>Cálcular Día Nacimiento</option>
                        </select> 
                    </div>
                     <median class="form-text font-weight-bold text-danger text-center">
                             <?=form_error('calculo');?>
                     </median>
                    <button id='btnSubmit' type="submit" class="btn btn-primary d-table mr-auto ml-auto">Calcular</button> 
                </form>
            </div>
        </div>
    </div>
</body>
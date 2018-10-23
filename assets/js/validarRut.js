function checkRut(rut) {
  
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');    
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();    
    // Formatear RUN
    rut.value = cuerpo + '-'+ dv    
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) {
        $('#mRut').html('RUT Incompleto');
        $('#btnSubmit').attr('disabled', true);
        rut.setCustomValidity("RUT Incompleto");
        return false;
    }
    
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;    
    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {    
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        
        // Sumar al Contador General
        suma = suma + index;
        
        // Consolidar Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
  
    }
    
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    
    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) {
        $('#mRut').html('RUT Inválido');
        $('#rut').removeClass('is-valid');
        $('#rut').addClass('is-invalid');
        $('#mRut').removeClass('text-success');
        $('#mRut').addClass('text-danger');
        $('#btnSubmit').attr('disabled', true);
        rut.setCustomValidity("RUT Inválido");
        return false;
    }
    
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
    $('#mRut').html('RUT válido');
    $('#mRut').removeClass('text-danger');
    $('#mRut').addClass('text-success');
    $('#rut').removeClass('is-invalid');
    $('#rut').addClass('is-valid');
    $('#btnSubmit').attr('disabled', false);
}
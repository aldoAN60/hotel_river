
//funcion que permite que todo el contenido javascript se cargue despues que el contenido HTML y que el back-end
document.addEventListener('DOMContentLoaded', function() { 
    const switchInput = document.getElementById('switch_factura');
    const RFC = document.getElementById('RFC');
    const RFC_mostrar = document.getElementById('RFC_mostrar');
    const razon_social_mostrar = document.getElementById('razon_social_mostrar');
    const razon_social = document.getElementById('razon_social');
    const status_mostrar = document.getElementById("status_mostrar");
    const status = document.getElementById("status");
    const metodo_pago = document.getElementById("metodo_pago");
    const tarifa = document.getElementById('tarifa');
    const tarifa_sin_imp_mostrar = document.getElementById('tarifa_sin_imp_mostrar');
    const tarifa_sin_imp = document.getElementById('tarifa_sin_imp');
    
    switchInput.addEventListener('change', function() {
        if (this.checked) {
            // Acción cuando el switch está activado
            
            // valores asignados al input hidden 
            RFC.value = "CSF PENDIENTE";
            razon_social.value = "CSF PENDIENTE";
            status.value = "PENDIENTE";
            // "valores" que muestra el input pero que no afectan a la insercion de la BD
            RFC_mostrar.placeholder = "CSF PENDIENTE";
            razon_social_mostrar.placeholder = "CSF PENDIENTE";
            status_mostrar.placeholder = "PENDIENTE";

            
        } else {
            // Acción cuando el switch está desactivado

            // valores asignados al input hidden 
            RFC.value = "XAXX010101123";
            razon_social.value = "PUBLICO EN GENERAL";
            status.value ="NO FACTURA"; 
            // "valores" que muestra el input pero que no afectan a la insercion de la BD
            status_mostrar.placeholder = "NO FACTURA";
            RFC_mostrar.placeholder = "XAXX010101123";
            razon_social_mostrar.placeholder = "PUBLICO EN GENERAL"; 
        }
    });

    metodo_pago.addEventListener('change', function() {
        
        var ult_4_digitos = document.getElementById("ult_4_digitos");
        if (this.value === '1') {
            ult_4_digitos.disabled = true;
            ult_4_digitos.placeholder = "N/A";
        } else {
            ult_4_digitos.disabled = false;
            ult_4_digitos.placeholder = "4 dígitos de la tarjeta";
        }
    });

    tarifa.addEventListener('input', function(){
        var precio = parseFloat(tarifa.value);
        var cantidad_sin_imp = precio / 1.20;
        tarifa_sin_imp_mostrar.value = cantidad_sin_imp.toFixed(2);
        tarifa_sin_imp.value = tarifa_sin_imp_mostrar.value;
    });
    
    
});







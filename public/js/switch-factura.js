
document.addEventListener('DOMContentLoaded', function() {
    const switchInput = document.getElementById('switch_factura');
    const RFC = document.getElementById('RFC');
    const razon_social = document.getElementById('razon_social');
    const folio = document.getElementById('folio_factura');
    const estatus = document.getElementById("estatus");
    const metodo_pago = document.getElementById("metodo_pago");
    const tarifa = document.getElementById('tarifa');
    const tarifa_sin_imp_mostrar = document.getElementById('tarifa_sin_imp_mostrar');
    const tarifa_sin_imp = document.getElementById('tarifa_sin_imp');
    
    switchInput.addEventListener('change', function() {
        if (this.checked) {
            // Acción cuando el switch está activado
            RFC.disabled = false;
            razon_social.disabled = false;
            folio.disabled = false;
            estatus.disabled = false;
            RFC.placeholder = "RFC";
            razon_social.placeholder = "RAZON SOCIAL";
            folio.placeholder = "folio";  
        } else {
            // Acción cuando el switch está desactivado
            RFC.disabled = true;
            razon_social.disabled = true;
            folio.disabled = true;
            estatus.disabled = true;
            estatus.value = "NO FACTURA";
            RFC.placeholder = "XAXX010101123";
            razon_social.placeholder = "PUBLICO EN GENERAL"; 
            folio.placeholder = "folio";    
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







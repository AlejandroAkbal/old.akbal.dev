/* --- Aplicar el color ya establecido --- */

if (localStorage.colorAplicado) {
    var elementoColorear = document.getElementById("elementoColorear");
    var colorAplicado = localStorage.colorAplicado;
    
    elementoColorear.innerHTML = 'html {background-color:' + colorAplicado + ';} .contenido1 {background:' + colorAplicado + ';filter:brightness(1.30);} .contenido2 {background:' + colorAplicado + ';filter:brightness(0.90);} .header, .footer {background:' + colorAplicado + ';}';
    
    }
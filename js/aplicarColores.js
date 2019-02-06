/* ------------- FUNCIONES DE COLORES ------------- */

/* --- Aplicar el color si ya esta establecido --- */

if (localStorage.colorAplicado) {
    var elementoColorear = document.getElementById("elementoColorear");
    var colorAplicado = localStorage.colorAplicado;

    /* - Escribir el color actual de forma que pueda ser enviado a la base de datos - */
    document.getElementById("colorGenerado").value = localStorage.colorAplicado;

    elementoColorear.innerHTML = 'html {background-color:' + colorAplicado + ';} .contenido1 {background:' + colorAplicado + ';filter:brightness(1.30);} .contenido2 {background:' + colorAplicado + ';filter:brightness(0.90);} .header, .footer {background:' + colorAplicado + ';}';

}

/* --- Generar un color nuevo y aplicarlo --- */

function cambiarStyle() {
    var elementoColorear = document.getElementById("elementoColorear");

    var colorGenerado = generarHex();
    document.getElementById("colorGenerado").value = colorGenerado;

    /* - Aplicar animacion de nuevo - */
    document.querySelector("html").style.animation = 'none';
    document.querySelector("html").offsetHeight;
    document.querySelector("html").style.animation = null;

    elementoColorear.innerHTML = 'html {background-color:' + colorGenerado + ';} .contenido1 {background:' + colorGenerado + ';filter:brightness(1.30);} .contenido2 {background:' + colorGenerado + ';filter:brightness(0.90);} .header, .footer {background:' + colorGenerado + ';}';
}

/* --- Genera un color aleatorio --- */

function generarHex() {
    var randomColor = '#' + ("000000" + Math.random().toString(16).slice(2, 8).toUpperCase()).slice(-6);

    return randomColor;
}

/* --- Aplicar un color pasado a la funcion --- */

function aplicarUnColor(x) {
    var elementoColorear = document.getElementById("elementoColorear");

    /* - Establecer el color pasado como color guardado - */
    document.getElementById("colorGenerado").value = x;
    localStorage.colorAplicado = x;

    /* - Aplicar animacion de nuevo - */
    document.querySelector("html").style.animation = 'none';
    document.querySelector("html").offsetHeight;
    document.querySelector("html").style.animation = null;

    elementoColorear.innerHTML = 'html {background-color:' + x + ';} .contenido1 {background:' + x + ';filter:brightness(1.30);} .contenido2 {background:' + x + ';filter:brightness(0.90);} .header, .footer {background:' + x + ';}';
}

/* --- Quitar los colores --- */

function quitarStyle() {
    var elementoColorear = document.getElementById("elementoColorear");

    /* - Aplicar animacion de nuevo - */
    document.querySelector("html").style.animation = 'none';
    document.querySelector("html").offsetHeight;
    document.querySelector("html").style.animation = null;

    localStorage.colorAplicado = "";
    elementoColorear.innerHTML = '';
    
    /* - Quitar el True RGB - */
    stopRGB();
}

/* --- Guarda el color en una cookie local --- */

function guardarStyle() {
    var colorGenerado = document.getElementById("colorGenerado").value;

    localStorage.colorAplicado = colorGenerado;
}






/* ------------- FUNCIONES DE COLORES 2 ------------- */

/* --- Defaults --- */
var i = 1;

var velocidad = 2000;
var transicion = 2;

/* --- Genera colores aleatorios todo el rato --- */

function randomRGB() {
    var elementoColorear = document.getElementById("elementoColorear");
    localStorage.colorAplicado = "randomRGB";
    localStorage.velocidadAplicado = "2000";
    localStorage.transicionAplicado = "2";

    /* - Fix para cuando se desactive y reactive este modo - */
    if (i >= 10000000) {
        i = 1;
    }


    /* - Funcion de Repeticion - */
    function myLoop() {
        setTimeout(function () {

            var elementoColorear = document.getElementById("elementoColorear");

            /* - Genera color random - */
            var colorGenerado = generarHex();

            elementoColorear.innerHTML = 'html {background-color:' + colorGenerado + ';} .contenido1 {background:' + colorGenerado + ';filter:brightness(1.30);} .contenido2 {background:' + colorGenerado + ';filter:brightness(0.90);} .header, .footer {background:' + colorGenerado + ';} *, .footer {transition: color ' + transicion + 's, background-color ' + transicion + 's, background ' + transicion + 's, filter ' + transicion + 's;}';

            /* - Repeticion - */

            i++;
            if (i < 10000000) {
                myLoop();
            }
            if (i >= 10000000) {
                elementoColorear.innerHTML = '* {transition: color ' + transicion + 's, background-color ' + transicion + 's, background ' + transicion + 's, filter ' + transicion + 's;}';
            }


        }, velocidad) /* --- Controlador de velocidad --- */
    }

    myLoop();

}

/* --- Sliders de variables --- */

var speedSlider = document.getElementById("velocidad");
var transitionSlider = document.getElementById("transicion");

speedSlider.oninput = function cambiarVelocidad() {
    x = document.getElementById("velocidad").value;
    velocidad = x;
    document.getElementById("variableVelocidad").innerHTML = x;

    /* - Guardar variable para cambio de pagina - */
    localStorage.velocidadAplicado = x;
}

transitionSlider.oninput = function cambiarTransicion() {
    x = document.getElementById("transicion").value;
    transicion = x / 10;
    document.getElementById("variableTransicion").innerHTML = x / 10;

    /* - Guardar variable para cambio de pagina - */
    localStorage.transicionAplicado = x;
}

/* --- Para (Stopea) los colores aleatorios --- */

function stopRGB() {
    i = 10000000;

    localStorage.colorAplicado = "";
    localStorage.velocidadAplicado = "";
    localStorage.transicionAplicado = "";
}

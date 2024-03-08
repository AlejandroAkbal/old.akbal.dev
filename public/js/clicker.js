/* ------------- CAMBIAR DE FORMA ------------- */

var forma = 0;


function cambiar_forma() {
    
    var el_boton = document.getElementById("el_boton");
    
        if (forma == 0) {

            el_boton.style.borderRadius = "0%";
            forma = 1;

        } else if (forma == 1) {

            el_boton.style.borderRadius = "100%";
            forma = 0;

        }
}

/* ------------- CLICKER ------------- */

var clicks = 0;

function onClick() {
    clicks++;
    document.getElementById("CPS").innerHTML = "Clicks: " + clicks;
    document.getElementById("meterlapuntuacion").value = clicks;
}

/* ------------- TOGGLE ------------- */

function onClickDatabase() {
    
    var Boton1 = document.getElementById("el_boton2");
    
        Boton1.classList.toggle("nada");

    var Database1 = document.getElementById("Database");

        Database1.classList.toggle("database");
}
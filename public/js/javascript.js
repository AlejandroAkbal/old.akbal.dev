/* ------------- ESCONDER Y MOSTRAR EL MENU ------------- */

function ToggleRGB() {
    var RGBContent = document.getElementById("RGBContent");
    if (RGBContent.style.maxHeight){
      RGBContent.style.maxHeight = null;
    } else {
      RGBContent.style.maxHeight = RGBContent.scrollHeight + "px";
    } 
}

/* --- Muestra / oculta el menu RGB --- ESTA FATAL PERO ES QUE NO FYUNCIONA DE OTRA PUTA FORMA COÑO YA  */
document.getElementById("MenuRGB").classList.add("nada");
document.getElementById("overlay").classList.add("nada");

function toggleRGBMenu() {
    document.getElementById("MenuRGB").classList.toggle("nada");
    document.getElementById("overlay").classList.toggle("nada");
}
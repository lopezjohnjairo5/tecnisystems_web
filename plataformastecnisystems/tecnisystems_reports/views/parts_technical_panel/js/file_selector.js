const $seleccionArchivos = document.querySelector("#path_input_photo_machine");
const $imagenPrevisualizacion = document.querySelector("#img_preview_machine");
var ctxIP = $imagenPrevisualizacion.getContext("2d");
var imgQR = new Image();

$seleccionArchivos.addEventListener("change", () => {
  const archivos = $seleccionArchivos.files;

  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }

  const primerArchivo = archivos[0];
  const objectURL = URL.createObjectURL(primerArchivo);
  imgQR.src = objectURL;
  imgQR.onload = function(){
    ctxIP.drawImage(imgQR,0,0,$imagenPrevisualizacion.width,$imagenPrevisualizacion.height);
  }
});

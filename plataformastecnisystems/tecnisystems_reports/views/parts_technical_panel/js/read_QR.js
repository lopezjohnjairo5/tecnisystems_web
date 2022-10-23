var sonido = new Audio("./audio/pitido.wav");
var scanner = new Instascan.Scanner({
  video : document.getElementById("qr_preview"),
  scanPeriod : 5,
  mirror : false
});

scanner.addListener('scan', function(respuesta){
  sonido.play();
  search_input = document.getElementById("search_machine").value = respuesta;
  close_pop_qr_search();
  ajax_search_machine();

  let msn = "Escaneo de QR de maquina con SERIAL: " + respuesta;
  ajax_save_record_user(msn);
});

function activate_qr_scan(){
  Instascan.Camera.getCameras().then(function(cameras){
    if(cameras.length > 0){
        try{
          scanner.start(cameras[1]);
        } catch (error) {
          scanner.start(cameras[0]);
        }
    }else{
      console.error("no hay camaras disponibles");
      alert("no hay camaras disponibles");
    }
  }).catch(function(e){
    console.error(e);
    //alert("ERROR: "+e);
  });
}

function deletePermisions(){
  Instascan.Camera.getCameras().then(function(cameras){
    if(cameras.length > 0){
        try{
          scanner.stop(cameras[1]);
        } catch (error) {
          scanner.stop(cameras[0]);
        }
    }else{
      console.error("no hay camaras disponibles");
      alert("no hay camaras disponibles");
    }
  }).catch(function(e){
    console.error(e);
    //alert("ERROR: "+e);
  });
}

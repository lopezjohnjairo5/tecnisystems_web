let btn_hamburguer = document.getElementById("hamburguer");
btn_hamburguer.addEventListener("click",function(){
  let navigation_technical_panel = document.getElementById("navigation_technical_panel");
  if(navigation_technical_panel.style.display != "none"){
    navigation_technical_panel.style.display = "none";
  }else{
    if(screen.width<=950 || window.innerWidth<=950){
      navigation_technical_panel.style.display = "flex";
    }else{
      navigation_technical_panel.style.display = "block";
    }
  }
});

function animation_charge_screen(){
  let load_page = document.getElementById("load_page");
  load_page.style.opacity = 1;

  let animation_charge = setInterval(function(){
    load_page.style.opacity -= 0.2;

    if(load_page.style.opacity <= -1){
      load_page.style.display = "none";
      clearInterval(animation_charge);
    }
  },100);
}

window.addEventListener("load",function(){
  animation_charge_screen();
});

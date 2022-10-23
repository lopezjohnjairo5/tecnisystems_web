function restart_color_btns(bts){
  for (var i = 0; i < bts.length; i++) {
    bts[i].children[0].style.backgroundColor = "";
  }
}

function change_section(ele){
  let sections = document.getElementsByClassName('content_technical_panel_sections');
  for (var i = 0; i < sections.length; i++) {
    if(ele.id.split("btn_")[1] == sections[i].id){
      let section = document.getElementById(sections[i].id);
      section.style.display = "inline-block";

      ele.children[0].style.backgroundColor = "#f7e48e";

      let msn = "click en "+ele.innerText;
      ajax_save_record_user(msn);

      if(ele.id.split("btn_")[1] == "record" ){
        ajax_record_user();
      }
    }
    else{
      let section = document.getElementById(sections[i].id);
      section.style.display = "none";
    }
  }

  if(screen.width<=950 || window.innerWidth<=950){
    let aside_nav = document.getElementById("navigation_technical_panel");
    aside_nav.style.display = "none";
  }
}

var btns = document.getElementsByClassName('navigation_technical_panel_sections');

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click",function(){
    restart_color_btns(btns);
    change_section(this);
  });
}

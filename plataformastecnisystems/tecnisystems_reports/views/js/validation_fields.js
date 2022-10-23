
function validation_fields(ele,element){
  let regex = /[!<"%/()='>?¿¡°\|\\,;\{\}\[\]\+\*]/;
  let new_text = "";

  for (var i = 0; i < element.length; i++) {
    if(regex.test(element[i])){
      new_text += "";
    }else{
      new_text += element[i];
    }
  }

  ele.value = new_text;
}

let vg = document.querySelectorAll('input');
for (var i = 0; i < vg.length; i++) {
  vg[i].addEventListener("keyup",function(){
    validation_fields(this,this.value);
  });
}

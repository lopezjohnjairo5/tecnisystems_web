function validate_pass(element){
  let reg = /[a-zA-Z0-9_#$&]{8}/;
  result = reg.test(element.value);
  if(result){
    element.style.background = "rgb(150,240,150)";
    element.style.boxShadow = "0 0 5px green";
  }else{
    element.style.background = "rgb(240,150,150)";
    element.style.boxShadow = "0 0 5px red";
  }
  if(element.value.length < 1){
    element.style.background = "rgb(255,255,255)";
    element.style.boxShadow = "none";
  }
}

var inputs_pass = document.getElementsByClassName('Vpass');
for (var i = 0; i < inputs_pass.length; i++) {
  inputs_pass[i].addEventListener("keyup",function(){
    validate_pass(this);
  });
}

function return_validate_email(emailValue){
  let regex = /^([.-_a-zA-Z0-9]+)@{1}([a-zA-Z0-9]{3,}).{1}([a-zA-Z0-9]{2,}).*([a-zA-Z0-9]*)/;
  let email = regex.test(emailValue) ? emailValue : '';

  return email;
}

function validate_email(element){

  let regex = /^([.-_a-zA-Z0-9]+)@{1}([a-zA-Z0-9]{3,}).{1}([a-zA-Z0-9]{2,}).*([a-zA-Z0-9]*)/;
  val = regex.test(element.value);

  if (val) {
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


v_email = document.getElementsByClassName("Vmail");
for (var i = 0; i < v_email.length; i++) {
  v_email[i].addEventListener("keyup",function (){
    validate_email(this);
  });
}

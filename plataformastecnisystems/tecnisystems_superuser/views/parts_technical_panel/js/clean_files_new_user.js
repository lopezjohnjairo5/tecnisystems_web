let newUpdateOption = document.getElementsByName('newUpdateOption');
for (var i = 0; i < newUpdateOption.length; i++) {
  newUpdateOption[i].addEventListener("change",function(){
    let new_type_user = document.getElementById("new_type_user").value = 0;
    let nitTechnical = document.getElementById("nitTechnical").value = "";
    let nameTechnical = document.getElementById("nameTechnical").value = "";
    let emailTechnical = document.getElementById("emailTechnical").value = "";
    let rolTechnical = document.getElementById("typeTechnical").value = 0;
    let tokenUser = document.getElementById("tokenElement").innerHTML = 0;
  });
}

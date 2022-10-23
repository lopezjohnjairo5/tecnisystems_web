let countDisplay = document.getElementById("back-count");
let count = 19;

let myInt = setInterval(() => {
  if (count < 0) {
    window.location.href = "https://plataformastecnisystems.com/";
  } else {
    countDisplay.innerHTML = count + " seg";
  }
  count--;
},1000);

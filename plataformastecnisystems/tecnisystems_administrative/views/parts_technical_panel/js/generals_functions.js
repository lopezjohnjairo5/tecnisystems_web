var record_nav_user = [];

function get_location(){
  let location_user = [];
  let options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  };

  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position){
      location_user.push(position.coords.latitude);
      location_user.push(position.coords.longitude);
      document.getElementById("latitude").innerHTML = position.coords.latitude;
      document.getElementById("longitude").innerHTML = position.coords.longitude;
    },function error(err) {
      console.warn('ERROR(' + err.code + '): ' + err.message);
    },options);
    return location_user;
  }

}


function get_date_time(){
  let date = new Date();
  let day = date.getDate() < 10 ? "0"+date.getDate() : date.getDate();
  let month = (date.getMonth()+1) < 10 ? "0"+(date.getMonth()+1) : date.getMonth()+1;
  let year = date.getFullYear();
  let complete_date = year+"-"+month+"-"+day;

  let hour = date.getHours();
  let minutes = date.getMinutes();
  let seconds = date.getSeconds();
  let complete_hour = hour+":"+minutes+":"+seconds;

  return [complete_date,complete_hour];
}

var lat_long = get_location();

window.onload = function(){
  get_date_time();
};

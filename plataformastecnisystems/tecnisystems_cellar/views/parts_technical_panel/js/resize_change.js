window.addEventListener('resize',function(){
  var screenWidth = screen.width;
  var windowWidth = window.innerWidth;
  
  if(screenWidth > 720 || windowWidth > 720){
     location.reload();
  }
});

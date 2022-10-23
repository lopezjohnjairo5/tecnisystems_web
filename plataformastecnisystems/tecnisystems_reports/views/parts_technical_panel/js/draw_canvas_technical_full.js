let my_Canvas_technical = document.querySelector('#canvas_technical_autograph');
ctx_technical = my_Canvas_technical.getContext("2d");
let lines_technical = [];
let correctionX_technical = 0;
let correctionY_technical = 0;
let drar_line_technical = false;
let newPositionX_technical = 0;
let newPositionY_technical = 0;
let position_technical = my_Canvas_technical.getBoundingClientRect();
correctionX_technical = position_technical.x;
correctionY_technical = position_technical.y;
my_Canvas_technical.width = 300;
my_Canvas_technical.height = 300;
var on_going_touches_technical = [];

function startup() {
  my_Canvas_technical.addEventListener("touchstart", handle_start_technical, false);
  my_Canvas_technical.addEventListener("touchend", handle_end_technical, false);
  my_Canvas_technical.addEventListener("touchcancel", handle_cancel_technical, false);
  my_Canvas_technical.addEventListener("touchmove", handle_move_technical, false);
}


function startup_mouse(){
  my_Canvas_technical.addEventListener('mousedown', begin_draw_technical, false);
  my_Canvas_technical.addEventListener('mousemove', draw_line_technical, false);
  my_Canvas_technical.addEventListener('mouseup', stop_draw_technical, false);
}


function handle_start_technical(evt) {
  evt.preventDefault();
  var touches = evt.changedTouches;
  var pos_ex_canvas = my_Canvas_technical.getBoundingClientRect();

  for (var i = 0; i < touches.length; i++) {
    on_going_touches_technical.push(copyTouch(touches[i]));
    var color = "#000";
    ctx_technical.beginPath();
    ctx_technical.arc(touches[i].clientX-pos_ex_canvas.left, touches[i].clientY-pos_ex_canvas.top, 4, 0, 2 * Math.PI, false);
    ctx_technical.fillStyle = color;
    ctx_technical.fill();
  }
}

function handle_move_technical(evt) {
  evt.preventDefault();
  var touches = evt.changedTouches;
  var pos_ex_canvas = my_Canvas_technical.getBoundingClientRect();

  for (var i = 0; i < touches.length; i++) {
    var color = "#000";
    var idx = ongoing_touch_index_by_id_technical(touches[i].identifier);

    if (idx >= 0) {
      ctx_technical.beginPath();
      ctx_technical.moveTo(on_going_touches_technical[idx].clientX-pos_ex_canvas.left, on_going_touches_technical[idx].clientY-pos_ex_canvas.top);
      ctx_technical.lineTo(touches[i].clientX-pos_ex_canvas.left, touches[i].clientY-pos_ex_canvas.top);
      ctx_technical.lineWidth = 5;
      ctx_technical.strokeStyle = color;
      ctx_technical.stroke();
      on_going_touches_technical.splice(idx, 1, copyTouch(touches[i]));  // swap in the new touch record
    }
  }
}

function handle_end_technical(evt) {
  evt.preventDefault();
  var touches = evt.changedTouches;

  for (var i = 0; i < touches.length; i++) {
    var color = "#000";
    var idx = ongoing_touch_index_by_id_technical(touches[i].identifier);
    var pos_ex_canvas = my_Canvas_technical.getBoundingClientRect();

    if (idx >= 0) {
      ctx_technical.lineWidth = 4;
      ctx_technical.fillStyle = color;
      ctx_technical.beginPath();
      ctx_technical.moveTo(on_going_touches_technical[idx].clientX -pos_ex_canvas.left, on_going_touches_technical[idx].clientY-pos_ex_canvas.top);
      ctx_technical.lineTo(touches[i].clientX -pos_ex_canvas.left, touches[i].clientY -pos_ex_canvas.top);
      ctx_technical.fillRect(touches[i].clientX -pos_ex_canvas.left - 4, touches[i].clientY -pos_ex_canvas.top - 4, 8, 8);
      on_going_touches_technical.splice(idx, 1);
    }
  }
}

function handle_cancel_technical(evt) {
  evt.preventDefault();
  var touches = evt.changedTouches;

  for (var i = 0; i < touches.length; i++) {
    var idx = ongoing_touch_index_by_id_technical(touches[i].identifier);
    on_going_touches_technical.splice(idx, 1);
  }
}


function copyTouch({ identifier, clientX, clientY }) {
  return { identifier, clientX, clientY };
}

function ongoing_touch_index_by_id_technical(idToFind) {
  for (var i = 0; i < on_going_touches_technical.length; i++) {
    var id = on_going_touches_technical[i].identifier;

    if (id == idToFind) {
      return i;
    }
  }
  return -1;
}

function clean_canvas_technical(){
  let ctx_technical = my_Canvas_technical.getContext('2d');
  ctx_technical.clearRect(0, 0, my_Canvas_technical.width, my_Canvas_technical.height);
  lines_technical = [];
  correctionX_technical = 0;
  correctionY_technical = 0;
  drar_line_technical = false;
  newPositionX_technical = 0;
  newPositionY_technical = 0;
  position_technical = my_Canvas_technical.getBoundingClientRect()
  correctionX_technical = position_technical.x;
  correctionY_technical = position_technical.y;
}

function begin_draw_technical() {
  position_technical = my_Canvas_technical.getBoundingClientRect()
  correctionX_technical = position_technical.x;
  correctionY_technical = position_technical.y;
  drar_line_technical = true;
  lines_technical.push([]);
};

function save_line_technical() {
  lines_technical[lines_technical.length - 1].push({
    x: newPositionX_technical,
    y: newPositionY_technical
  });
}

function draw_line_technical(event) {
  event.preventDefault();
  if (drar_line_technical) {
    let ctx_technical = my_Canvas_technical.getContext('2d')
    ctx_technical.lineJoin = ctx_technical.lineCap = 'round';
    ctx_technical.lineWidth = 5;
    ctx_technical.strokeStyle = '#000';

    if (event.changedTouches == undefined) {
        newPositionX_technical = event.layerX;
        newPositionY_technical = event.layerY;
    } else {
        newPositionX_technical = event.changedTouches[0].clientX - correctionX_technical;
        newPositionY_technical = event.changedTouches[0].clientY - correctionY_technical;
    }

    save_line_technical();

    ctx_technical.beginPath();
    lines_technical.forEach(function (segmento_technical) {
        ctx_technical.moveTo(segmento_technical[0].x, segmento_technical[0].y);
        segmento_technical.forEach(function (punto_technical, index_technical) {
            ctx_technical.lineTo(punto_technical.x, punto_technical.y);
        });
    });
    ctx_technical.stroke();
  }
}

function stop_draw_technical () {
  drar_line_technical = false;
  save_line_technical();
}

function save_draw_technical() {
  var link_technical = document.createElement('a')
  link_technical.download = "firma";
  link_technical.href = my_Canvas_technical.toDataURL("image/png").replace("image/png", "image/octet-stream");
  link_technical.click();
}

document.addEventListener("DOMContentLoaded", function(){
  if (window.ontouchstart !== undefined) {
    startup();
  } else {
    startup_mouse();
  }
});

button_clean_technical = document.getElementById("button_clean_technical_autograph");
button_clean_technical.addEventListener("click",clean_canvas_technical);

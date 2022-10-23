let my_Canvas_client = document.querySelector('#canvas_client_autograph');

ctx_client = my_Canvas_client.getContext("2d");

let lines_client = [];
let correctionX_client = 0;
let correctionY_client = 0;
let drar_line_client = false;
let newPositionX_client = 0;
let newPositionY_client = 0;
let position_client = my_Canvas_client.getBoundingClientRect();
correctionX_client = position_client.x;
correctionY_client = position_client.y;

my_Canvas_client.width = 300;
my_Canvas_client.height = 300;

var on_going_touches_client = [];

function startup_client() {
  my_Canvas_client.addEventListener("touchstart", handle_start_client, false);
  my_Canvas_client.addEventListener("touchend", handle_end_client, false);
  my_Canvas_client.addEventListener("touchcancel", handle_cancel_client, false);
  my_Canvas_client.addEventListener("touchmove", handle_move_client, false);
}


function startup_client_mouse(){
  my_Canvas_client.addEventListener('mousedown', begin_draw_client, false);
  my_Canvas_client.addEventListener('mousemove', draw_line_client, false);
  my_Canvas_client.addEventListener('mouseup', stop_draw_client, false);
}


function handle_start_client(evt) {
  evt.preventDefault();
  var touches_client = evt.changedTouches;
  var pos_ex_canvas = my_Canvas_client.getBoundingClientRect();

  for (var i = 0; i < touches_client.length; i++) {
    on_going_touches_client.push(copyTouch(touches_client[i]));
    var color_client = "#000";
    ctx_client.beginPath();
    ctx_client.arc(touches_client[i].clientX-pos_ex_canvas.left, touches_client[i].clientY-pos_ex_canvas.top, 4, 0, 2 * Math.PI, false);
    ctx_client.fillStyle = color_client;
    ctx_client.fill();
  }
}

function handle_move_client(evt) {
  evt.preventDefault();
  var touches_client = evt.changedTouches;
  var pos_ex_canvas = my_Canvas_client.getBoundingClientRect();

  for (var i = 0; i < touches_client.length; i++) {
    var color_client = "#000";
    var idx_client = ongoing_touch_index_by_id_client(touches_client[i].identifier);

    if (idx_client >= 0) {
      ctx_client.beginPath();
      ctx_client.moveTo(on_going_touches_client[idx_client].clientX-pos_ex_canvas.left, on_going_touches_client[idx_client].clientY-pos_ex_canvas.top);
      ctx_client.lineTo(touches_client[i].clientX-pos_ex_canvas.left, touches_client[i].clientY-pos_ex_canvas.top);
      ctx_client.lineWidth = 5;
      ctx_client.strokeStyle = color_client;
      ctx_client.stroke();
      on_going_touches_client.splice(idx_client, 1, copyTouch(touches_client[i]));
    }
  }
}

function handle_end_client(evt) {
  evt.preventDefault();
  var touches_client = evt.changedTouches;

  for (var i = 0; i < touches_client.length; i++) {
    var color_client = "#000";
    var idx_client = ongoing_touch_index_by_id_client(touches_client[i].identifier);
    var pos_ex_canvas = my_Canvas_client.getBoundingClientRect();

    if (idx_client >= 0) {
      ctx_client.lineWidth = 4;
      ctx_client.fillStyle = color_client;
      ctx_client.beginPath();
      ctx_client.moveTo(on_going_touches_client[idx_client].clientX-pos_ex_canvas.left, on_going_touches_client[idx_client].clientY-pos_ex_canvas.top);
      ctx_client.lineTo(touches_client[i].clientX-pos_ex_canvas.left, touches_client[i].clientY-pos_ex_canvas.top);
      ctx_client.fillRect(touches_client[i].clientX-pos_ex_canvas.left - 4, touches_client[i].clientY-pos_ex_canvas.top - 4, 8, 8);
      on_going_touches_client.splice(idx_client, 1);
    }
  }
}

function handle_cancel_client(evt) {
  evt.preventDefault();
  var touches_client = evt.changedTouches;

  for (var i = 0; i < touches_client.length; i++) {
    var idx_client = ongoing_touch_index_by_id_client(touches_client[i].identifier);
    on_going_touches_client.splice(idx_client, 1);  // remove it; we're done
  }
}


function copyTouch({ identifier, clientX, clientY }) {
  return { identifier, clientX, clientY };
}

function ongoing_touch_index_by_id_client(idToFind) {
  for (var i = 0; i < on_going_touches_client.length; i++) {
    var id = on_going_touches_client[i].identifier;

    if (id == idToFind) {
      return i;
    }
  }
  return -1;
}

function clean_canvas_client(){
  let ctx_client = my_Canvas_client.getContext('2d');
  ctx_client.clearRect(0, 0, my_Canvas_client.width, my_Canvas_client.height);
  lines_client = [];
  correctionX_client = 0;
  correctionY_client = 0;
  drar_line_client = false;
  newPositionX_client = 0;
  newPositionY_client = 0;
  position_client = my_Canvas_client.getBoundingClientRect()
  correctionX_client = position_client.x;
  correctionY_client = position_client.y;
}

function begin_draw_client() {
    position_client = my_Canvas_client.getBoundingClientRect()
    correctionX_client = position_client.x;
    correctionY_client = position_client.y;
    drar_line_client = true;
    lines_client.push([]);
};

function save_line_client() {
  lines_client[lines_client.length - 1].push({
      x: newPositionX_client,
      y: newPositionY_client
  });
}

function draw_line_client(event) {
  event.preventDefault();
  if (drar_line_client) {
    let ctx_client = my_Canvas_client.getContext('2d')
    ctx_client.lineJoin = ctx_client.lineCap = 'round';
    ctx_client.lineWidth = 5;
    ctx_client.strokeStyle = '#000';
    if (event.changedTouches == undefined) {
        newPositionX_client = event.layerX;
        newPositionY_client = event.layerY;
    } else {
        newPositionX_client = event.changedTouches[0].clientX - correctionX_client;
        newPositionY_client = event.changedTouches[0].clientY - correctionY_client;
    }

    save_line_client();

    ctx_client.beginPath();
    lines_client.forEach(function (segmento_client) {
        ctx_client.moveTo(segmento_client[0].x, segmento_client[0].y);
        segmento_client.forEach(function (punto_client, index_client) {
            ctx_client.lineTo(punto_client.x, punto_client.y);
        });
    });
    ctx_client.stroke();
  }
}

function stop_draw_client () {
    drar_line_client = false;
    save_line_client();
}

function save_draw_client() {
    var link_client = document.createElement('a')
    link_client.download = "firma";
    link_client.href = my_Canvas_client.toDataURL("image/png").replace("image/png", "image/octet-stream");
    link_client.click();
}


document.addEventListener("DOMContentLoaded", function(){
  if (window.ontouchstart !== undefined) {
    startup_client();
  }else{
    startup_client_mouse();
  }
});

button_clean_client = document.getElementById("button_clean_client_autograph");
button_clean_client.addEventListener("click",clean_canvas_client);

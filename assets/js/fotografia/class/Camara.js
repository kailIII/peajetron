function Camara()
{
  video = document.querySelector("#videoElement");
  this.boton  = document.querySelector('#boton');
  this.img = document.querySelector('#preview');
  this.imagen = document.querySelector('#imagen');
  navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

  if (navigator.getUserMedia) {
      navigator.getUserMedia({ video : true}, this.handleVideo, this.videoError);
  }
}

Camara.prototype.handleVideo = function(stream)
{
  video.src = window.URL ? window.URL.createObjectURL(stream) : stream;
  video.play();
}

Camara.prototype.videoError = function(e)
{
  alert("Su navegador no soporta html5");
}

Camara.prototype.takePicture = function()
{
  var canvas = document.querySelector('#snapElement');
//   canvas.id = 'hiddenCanvas';
//   document.body.appendChild(canvas);
//   document.getElementById('canvasHolder').appendChild(canvas);
  canvas.width = video.videoWidth / 4;
  canvas.height = video.videoHeight / 4;
  var ctx = canvas.getContext('2d');
  ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
  dataURL = canvas.toDataURL();
  this.img.src = dataURL;
  return new Fotografia(ctx);
}
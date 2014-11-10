function loadImage(picName)
{
  var canvas = document.querySelector('#testCanvas');
  var snapShot = getSimulatedPicture(picName);
  var ctx = canvas.getContext('2d');
  var ni = new Image();
  ni.src= snapShot;
  ctx.drawImage(ni, 0, 0, canvas.width, canvas.height);
  return canvas;
}

function getSimulatedPicture(picName)
{
  return "stubs/images/"+picName;
}
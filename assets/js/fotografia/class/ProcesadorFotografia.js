function ProcesadorFotografia(){
  this.image = null;
}

ProcesadorFotografia.prototype.processImage =  function(imageData)
{
  var regexp = "[^a-zA-Z0-9]";
  this.image = imageData;
//   alert(OCRAD(this.image.ctx));
  text = $.trim(OCRAD(this.image.ctx));
  
  return $.trim(OCRAD(this.image.ctx));
//   return "Welcome to the Ocrad.js Demo! ";
}

ProcesadorFotografia.prototype.setImage = function(nImage)
{
  this.image = nImage;
}
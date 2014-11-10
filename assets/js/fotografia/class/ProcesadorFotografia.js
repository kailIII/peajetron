function ProcesadorFotografia(){
  this.image = null;
}

ProcesadorFotografia.prototype.processImage =  function(imageData)
{
  var regexp = "^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$"; 
  this.image = imageData;
  text = $.trim(OCRAD(this.image.ctx));
  if (text.match(regexp))
  {
    return text;
  }
  else
  {
    return false;
  }
}

ProcesadorFotografia.prototype.setImage = function(nImage)
{
  this.image = nImage;
}
function CamaraHandler()
{
  this.mProcessor = new ProcesadorFotografia();
  this.mCamera = new Camara();
}

CamaraHandler.prototype.processImage = function(imageData)
{
  var image = this.mCamera.takePicture();
  var text = this.mProcessor.processImage(image);
  return text;
}
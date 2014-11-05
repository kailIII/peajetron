function MainHandler(){
  this.mHCameraHandler = new CamaraHandler();
  this.mDispatcherHandler = new DespachadorRegistro();
}

MainHandler.prototype.ProcessAndRequest= function()
{
  var textImage = this.mHCameraHandler.processImage();
  alert(textImage);
  this.mDispatcherHandler.sendRequest(textImage);
}
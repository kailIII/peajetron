//instrucciones
function casoN()
{
  var image = new Fotografia(loadImage('le.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//instrucciones
function casoP()
{
  var image = new Fotografia(loadImage('welcome.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}

//integración?
function testInsertOK()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("stubs/stub_peticion.php", "POST");
  return(despachador.sendRequest("RFT453"));
}


function testInsertError()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("stubs/stub_peticion_error.php", "POST");
  return (despachador.sendRequest("RFT45345_3"));
}

//condicionales
function testRegexp()
{
  var image = new Fotografia(loadImage('Foto_6.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}

//condicionales




QUnit.test( "OCR Test", function( assert ) {
  var tt = casoN();
  assert.equal( casoN(), "Le" );
  assert.equal( casoP(), "WelIome lo _ne ocrad __ oemol" );
  assert.equal( testInsertOK(), "OK" );
  assert.equal( testInsertError(), "ERROR" );
  assert.equal( testRegexp(), true );
  

  });
;
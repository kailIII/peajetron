//instrucciones, camino
function casoN()
{
  var image = new Fotografia(loadImage('le.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//instrucciones, camino
function casoP()
{
  var image = new Fotografia(loadImage('welcome.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//condicionales,instrucciones, camino

function validNumber()
{
  var image = new Fotografia(loadImage('Foto_1.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//condicionales,instrucciones, camino
function checkIncomplete()
{
  var image = new Fotografia(loadImage('Foto_2.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//condicionales,instrucciones, camino
function testRegexp()
{
  var image = new Fotografia(loadImage('Foto_61.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}

//condicionales,instrucciones, camino
function testRegexWorjks()
{
  var image = new Fotografia(loadImage('Foto_1.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//condicionales,instrucciones, camino
function testUnvalidCharacter()
{
  var image = new Fotografia(loadImage('Foto_3.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//condicionales,instrucciones, camino
function testValidPlac2()
{
  var image = new Fotografia(loadImage('Foto_4.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}
//condicionales,instrucciones, camino
function testUValidDot()
{
  var image = new Fotografia(loadImage('Foto_5.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}

//condicionales
function testPOSTOK()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("stubs/stub_peticion.php", "GET");
  return(despachador.sendRequest("RFT453"));
}

function testPOSTERROR()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("stubs/stub_peticion_error.php", "GET");
  return (despachador.sendRequest("RFT45345_3"));
}


//integración?
function testInsertOK()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("../fotografia/registrarPaso", "POST");
  return(despachador.sendRequest("RFT453"));
}

function testInsertError()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("../fotografia/registrarPaso", "POST");
  return (despachador.sendRequest("RFT45345_3"));
}

//integración?
function testInsertOKI()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("../fotografia/registrarPaso", "POST");
  return(despachador.sendRequest("RFT453"));
}

function testInsertErrorI()
{
  var despachador = new DespachadorRegistro();
  despachador.setConfigurations("../fotografia/registrarPaso", "POST");
  return (despachador.sendRequest("RFT45345_3"));
}


QUnit.test( "OCR Test", function( assert ) {
  var tt = casoN();
  assert.equal( testRegexp(), false );
  assert.equal( validNumber(), "RTE453" );
  assert.equal( testRegexWorjks(), "RTE453" );
  assert.equal( checkIncomplete(), false );
  assert.equal( testUnvalidCharacter(), false );
  assert.equal( testValidPlac2(), "Ahd 562");
  assert.equal( testUValidDot(), false);
  
  assert.equal( casoN(), "Le" );
  assert.equal( casoP(), "WelIome lo _ne ocrad __ oemol" );
  assert.equal( testInsertOK(), "OK" );
  assert.equal( testInsertError(), "ERROR" );
  
  assert.equal( testPOSTOK(), "OK" );
  assert.equal( testPOSTERROR(), "ERROR" );

    assert.equal( testInsertOKI(), "OK" ); 
  assert.equal( testInsertErrorI(), "ERROR" );
  
  
  });
;
function casoN()
{
  var image = new Fotografia(loadImage('le.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}

function casoP()
{
  var image = new Fotografia(loadImage('welcome.png'));
  var cam_procesor  = new ProcesadorFotografia();
  var text = cam_procesor.processImage(image);
  return text;
}

QUnit.test( "OCR Test", function( assert ) {
  var tt = casoN();
  assert.equal( casoN(), "Le" );
  assert.equal( casoP(), "WelIome lo _ne ocrad __ oemol" );
  });

// QUnit.test( "Le 2", function( assert ) {
//   assert.ok( casoP().localeCompare('Le'), "Le 2 Image" );
//   });
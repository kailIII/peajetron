console.log( ' exporter...');

function Exporter() {

}

Exporter.prototype.exportarAPDF = function(body)
{

  if( body.length > 0 )
  {
      var myWidths = [];
      var top = body[0].length;
      for( var i=0; i<top; i++)
      {
          myWidths.push( '*' );
      }
      var docDefinition = {
         header: {
            margin: 10,
            columns: [

                {
                    alignment: 'center',
                    text: 'PAGO DE PEAJES',
                    bold:true,
                }
            ]
        },
        footer: {
            stack: [
                { text: 'Universidad Distrital Francisco José de Caldas - Seminario Ingeniería de Software - 2014 ',
                  alignment: 'center',
                  fontSize:10
                }
            ]
        },
        content: [
          {
            table: {
              headerRows: 1,
              widths: myWidths,
              body: body
            }
          }
        ]
      };//end docDefinition
      pdfMake.createPdf(docDefinition).open();
  }

};

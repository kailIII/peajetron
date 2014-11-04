
$(function(){
    $( '#descargar' ).bind( 'click',function(){

      $.ajax({
        type: "POST",
        url: "http://localhost/peajetron/index.php/consultasWeb/historialPago/getDataSource",
        success:function(data){
          var peajes = JSON.parse( data );
          var body = [];
          body.push( [
            { text: 'PEAJE', bold: true,alignment: 'center' },
            { text: 'RUTA', bold: true ,alignment: 'center' },
            { text: 'FECHA CRUCE', bold: true, alignment: 'center'  },
            { text: 'HORA', bold: true, alignment: 'center'  },
            { text: 'VALOR', bold: true , alignment: 'center' },
          ]);
          for (key in peajes)
          {
              if (peajes.hasOwnProperty(key))
              {
                  var peaje = peajes[key];
                  var fila = new Array();
                  fila.push( { text: peaje.codigo.toString() ,alignment: 'center', fontSize: 10 } );
                  fila.push( { text: peaje.fechaCorte.toString() ,alignment: 'center' ,fontSize: 10}  );
                  fila.push( { text: peaje.fechaPago.toString(),alignment: 'center' ,fontSize: 10}  );
                  fila.push( { text: peaje.valor.toString(),alignment: 'center',fontSize: 10 }   );
                  body.push(fila);
              }
          }
          var exporter = new Exporter();
          exporter.exportarAPDF( body );
        }//end success

      });

    });
});

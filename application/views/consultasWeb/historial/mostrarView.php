

	<!-- </div>  Esta en el menu-->
		<h2>Lista de peajes cruzados </h2>


		<?php if ( $status ) : ?>
			<div class="well">
				<p> A continuación se muestra la lista de los peajes por los cuales ha cruzado el vehículo <?php echo $marca . " " .$modelo ; ?> con placa <b> <?php echo $placa;?> </b> </p>
			</div>
			<table cellpadding="0" cellspacing="0" border="0" class="table-boot table-boottable table-striped table-bordered">
			<thead>
			    <tr class="odd gradeX">
			      <th>Peaje </th>
			      <th>Ruta </th>
			      <th>Fecha de cruce</th>
			      <th>Hora</th>
			      <th>Valor </th>
			    </tr>
			</thead>
			<?php
				foreach( $peajes as $peaje )
				{
					echo "<tr class='odd gradeX'>
							<td>".$peaje['peaje']."</td>
							<td>".$peaje['ruta']."</td>
							<td>".$peaje['fechaCruce']."</td>
							<td>".$peaje['hora']."</td>
							<td>".$peaje['valor']."</td>
						</tr>";
				}
			?>
			</table>

			<div>
					<button class="btn btn-success" id="descargar" value="Descargar PDF" > Descargar PDF</button>
			</div>
		<?php else : ?>
			El usuario no presenta ningún registro  de cruce por peaje del vehículo seleccionado
		<?php endif; ?>
	</div><!--END CONTAINTER DIV-->

	<div class="css-js">
			<script asyn type="text/javascript" src="<?php echo base_url('assets/js/pdfmake.js');?>"></script>
			<script asyn type="text/javascript" src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
			<script type="text/javascript">
				$(function(){
						$( '#descargar' ).bind( 'click',function(){

							$.ajax({
								type: "POST",
								url: "http://localhost/peajetron/index.php/consultasWeb/historialPeajes/getDataSource",
								success:function(data){
									var peajes = JSON.parse( data );

									var body = [];
									body.push( [ { text: 'PEAJE', bold: true,alignment: 'center' },
										{ text: 'RUTA', bold: true ,alignment: 'center' },
									  { text: 'FECHA CRUCE', bold: true, alignment: 'center'  },
										{ text: 'VALOR', bold: true , alignment: 'center' },
								  ]);
									for (key in peajes)
									{
									    if (peajes.hasOwnProperty(key))
											{
									        var peaje = peajes[key];
													var fila = new Array();
													fila.push( { text: peaje.peaje.toString() ,alignment: 'center' } );
													fila.push( { text: peaje.ruta.toString() ,alignment: 'center' }  );
													fila.push( { text: peaje.fechaCruce.toString() + '  '+ peaje.hora.toString() ,alignment: 'center' }  );
													fila.push( { text: peaje.valor.toString(),alignment: 'center' }   );
											    body.push(fila);
									    }
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
								            {text: 'Universidad Distrital Francisco José de Caldas - Seminario Ingeniería de Software - 2014 ', alignment: 'center'}
								        ]
								    },
									  content: [
									    {
									      table: {
									        headerRows: 1,
									        widths: [ '*', 'auto', 100, '*' ],

									        body: body
									      }
									    }
									  ]
									};//end docDefinition
									pdfMake.createPdf(docDefinition).open();

								}//end success

							});

						});
				});
			</script>
	</div>
	</body>
</html>

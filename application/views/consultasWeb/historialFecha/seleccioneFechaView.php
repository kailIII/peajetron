
		<h4>Seleccione las fechas en las que desea obtener la informacion</h4>
		
		<div id="formulario-seleccion-fechas">
			<?php 
						echo form_open( site_url() .'/consultasWeb/historialPeajesFecha/mostrarPeajes');
			?>
			
			<div id="calendarios">
			    <div class='col-md-5'>
			    		<label for="fechaInicial" >Fecha inicial</label>
			            <div class="form-group">
			                <div class='input-group date' >
			                    <input 
			                    	name="fechaInicial"
			                    	type='input' 
			                    	class="form-control datetimepicker fecha" 
			                    	required="required" 
			                    	data-date-format="YYYY-MM-DD"
			                    />
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			    </div>
			    
			    <div class='col-md-5'>
			    	<label for="fechaFinal" >Fecha final</label>
			        <div class="form-group">
			                <div class='input-group date'>
			                    <input 
			                    	name="fechaFinal"
			                    	type='input' 
			                    	class="form-control datetimepicker fecha"  
			                    	required="required"
			                    	data-date-format="YYYY-MM-DD"
			                    />
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			    </div>
			</div> <!--  fin de candelarios -->
			<input type="hidden" name="idVehiculo" value="<?php echo $idVehiculo; ?>"> 
			<div class='col-md-5' id="botones-lista">
				<button class="btn btn-success" type="submit" accesskey="a">Continuar</button>
				
			</div>
			<?php
				echo form_close();
			?>	
		</div><!-- fin de formularios -->	

	</div>
	<div class="css-js">
		<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
	 	<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet" type="text/css">
	 	
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/locales/jvalidate-messages_es.js');?>"></script>
		
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/moment.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-js/transition.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-js/collapse.js');?>"></script>

		
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js');?>"></script>
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/validaciones/validate-calendar.js');?>"></script>
		
		
		
		<link href="<?php echo base_url('assets/css/menu.css');?>" rel="stylesheet" type="text/css">
		<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fecha.js');?>"></script>
		<script type="text/javascript">
	        $(function () {
	            $('.datetimepicker').datetimepicker({
	                pickTime:false, 
	                language: 'es'
	            });
	        });
	    </script>
	</div>
	</body>
</html>
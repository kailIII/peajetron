<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="stuff, to, help, search, engines, not" name="keywords">
<meta content="What this page is about." name="description">
<meta content="Display Webcam Stream" name="title">
<title>Display Webcam Stream</title>
  
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->

</head>
  
<body>
<div id="canvasHolder">
    <video autoplay="true" id="videoElement">
     
    </video>
</div>
<div id="container_snap">
  <canvas id="snapElement"></canvas>
</div>
<div id="message"></div>
<div id="boton">TOMAR FOTO</div>

<div>
  <label>Seleccione la cabina en la que se encuentra</label>
  <select id="identificador_cabina" name="identificador_cabina">
    <?php 
      foreach($peajes as $peaje){
        echo '<option value="'.$peaje['id_peaje'].'">'.$peaje['peaje'].'  </option>';
      }
    ?>
  </select>
</div>
<img id="preview" src="">

<script asyn type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.1.min.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/ocrad.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/CryptoJS_v3.1.2/rollups/sha1.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/class/Fotografia.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/class/Camara.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/class/ProcesadorFotografia.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/class/CameraHandler.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/class/Configuration.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/class/DespachadorRegistro.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/class/MainHandler.js');?>"></script>
<script asyn type="text/javascript" src="<?php echo base_url('assets/js/fotografia/main_script.js');?>"></script>

</body>
</html>
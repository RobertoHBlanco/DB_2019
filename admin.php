<?php
include("funciones.php");
?>

<!DOCTYPE html>    
<html>
<head>
 <meta charset="UTF-8">
    <meta name="viewpoort" content="width=device-width,initial-scale=1.0">
    
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
 
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<!--    <script src="librerias/javascript/jquery.easy-autocomplete.min.js"></script> -->
    <script src="librerias/javascript/jquery-ui.min.js"></script> 
    
     
     <!--css que contiene las CSS del autocomplete-->
<!--     <link rel="stylesheet" href="librerias/css/easy-autocomplete.css">
     <link rel="stylesheet" href="librerias/css/easy-autocomplete.themes.css">-->
     
   <!--librerias bootstrap-->
    
     <script language="JavaScript" SRC="funciones.js"></script>
    
    <script type="text/javascript" src="librerias/javascript/jquery.js"></script>
     
   
     <!--css que contiene las fuentes e iconos de la app-->
     
    <script src="librerias/javascript/moment.min.js"></script>

   
    <!--libreria js-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
        <!--autocomplete-->
   

   
   <!--ClockPickerr-->
   <link rel="stylesheet" href="librerias/css/bootstrap-clockpicker.css">
   <script src="librerias/javascript/bootstrap-clockpicker.js"></script>  
   
   <link rel="stylesheet" href="librerias/css/bootstrap-datepicker.css">
   <script src="librerias/javascript/bootstrap-datepicker.min.js"></script> 
   
   
  
   
</head>   
<body> 
<div id="formulario" style="margin-left: 15px;">    
    <h1>Formulario de Acceso</h1>
    <form class="form-group">

        <label>Usuario</label><br>    
        <input type="text" id="usuario" required="required" style="width: 300px" value=""/><br>
        <label>Contraseña</label><br> 
        <input type="pass" id="pass" required="required" style="width: 300px" value=""/><br><br>
        <button onclick="autentificar()" style="width: 100px;">Login</button>

    </form>
    <div id="listado_suscripciones">
        
        
    </div>
    

<script>
function autentificar(){
    var usuario = $('#usuario').val();
    var contrasena = $('#pass').val();
   
    $.post('accion.php', {usuario: usuario,contrasena:contrasena}, function(mensaje) { 
  
      if (mensaje == 1){
           location.href="index.php";
      }else{
          alert("Solo puedes acceder aquí, si eres administrador. Si nolo eres, por favor, cierra la página.");
          exit();
      }
    

    });
}

function validar_email(email) 
{
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function eliminar_suscripcion(id){
    $.post('accion.php', {id: id}, function(mensaje) { 
      alert(mensaje);
      location.href="index.php";

      }); 
    
}
function  cargar_datos(nombre){
    alert(nombre);
    
}

</script>  

 
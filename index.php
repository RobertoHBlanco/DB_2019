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
    <h1>Formulario de Suscripción</h1>
    <form class="form-group">

        <label>Nombre</label><br>    
        <input type="text" id="nombre" required="required" style="width: 300px" value=""/><br>
        <label>Email</label><br> 
        <input type="email" id="email" required="required" style="width: 300px" value=""/><br><br>
        <button onclick="guardar_registro()" style="width: 100px;">suscribir</button>

    </form>
   
    
    
    <div class="form-group table-responsive" id="listado_suscripciones">   
      <table class="table" id="tabla-suscripciones" style="border:0 !important; width:1500px !important;">


      <?php
          $conectando = conectar();

          $sql ="SELECT ID,NOMBRE,EMAIL,FECHA
                                FROM suscriptores      
                                ORDER BY FECHA DESC";

    //                           
          $result = mysqli_query($conectando, $sql);

          // comienza un bucle que leerá todos los registros existentes
          ?>
          <tr style="background:#6d9ed1;">
              <td colspan="1">codigo </td><td colspan="3">Nombre</td><td colspan="3">Email</td><td colspan="3">Fecha</td>
          </tr>
          <?php
          while($row = mysqli_fetch_array($result)) {

              $id = $row['ID'];
              $nombre = $row['NOMBRE'];
              $email = $row['EMAIL'];
              $fecha = $row['FECHA'];

           ?>


          <tr class="linea_comentario" id="linea_reserva" style="cursor:pointer;" onclick="cargar_datos()"><td colspan="1"><?php echo $id; ?></td><td colspan="3"><?php echo $nombre;?></td><td colspan="3"><?php echo $email;?></td><td colspan="1"><?php echo $fecha;?></td>

              <td style="float:right; background-color: transparent !important"><img src="papelera.png" style="width:30px;cursor:pointer;" onclick="eliminar_suscripcion(<?php echo $id?>)"><td></tr>                                            
          <!--echo "<div class='linea'><tr class=''><td>$fecha_reserva</td><td>texto_actividad($id_actividad)</td><td>$actividad_confirmada</td></tr</div>";-->
        <?php 

          }

          $sql ="SELECT count(*) as total FROM suscriptores";

         $contador = mysqli_query($conectando, $sql);
         $reg_contador = mysqli_fetch_row($contador);

          $total = $reg_contador[0];
          echo("<h3>El Nº Total de suscripciones es : $total</h3><hr>");

    //       $sql ="SELECT comment_author, count(*) as cuenta FROM wp_comments GROUP by comment_author";
    //       $result = mysqli_query($conectando, $sql);



           //while($row = mysqli_fetch_array($result)) {
             //  $autor_cab = $row['comment_author'];
               //$cuenta_cab = $row['cuenta'];


               //echo "<div id='botones_filtros' style='float:left'>".$autor_cab."(".$cuenta_cab.")"."</div>";

           //}

    //      $result = mysqli_query($conectando, $sql);

          //mysqli_free_result($result); // Liberamos los registros
          mysqli_close($conectando); // Cerramos la conexion con la base de datos
         ?>

      </table>   


    </div>
</div>   
<script>
function guardar_registro(){
    var email = $('#email').val();
    var nombre = $('#nombre').val();
    if(!validar_email(email) ){
        alert("El email NO es correcto");
        exit();
    }
    
    $.post('accion.php', {email: email,nombre:nombre}, function(mensaje) { 
      alert(mensaje);
      location.href="index.php";

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

 
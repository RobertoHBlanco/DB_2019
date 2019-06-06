<?php
include("funciones.php");

if (isset($_POST['email'])){
   $email_registrar = $_POST['email'];
   $nombre_registrar = $_POST['nombre'];
     $conectando = conectar();
     
        $sql = "INSERT INTO suscriptores SET 
                    ID = '',
                    NOMBRE = '$nombre_registrar',
                    EMAIL = '$email_registrar',    
                    FECHA = Now()";
            
            $result = mysqli_query($conectando, $sql);
            if ($result) {
                echo "registro insertado con exito.";
            } else {
                echo "Error: " . $sql . "<br>" . $conectando->error;
            }   
      
      
     mysqli_close($conectando);  
      
      
}

if (isset($_POST['id'])){
$id_eliminar = $_POST['id'];
$conectando = conectar();
$sql = "DELETE FROM suscriptores WHERE id = '$id_eliminar'";
    $result = mysqli_query($conectando, $sql);
     if ($result) {
            echo "Suscripcion eliminada con éxito.";
    } else {
            echo "Error: " . $sql . "<br>" . $conectando->error;
    }   
      
    mysqli_close($conectando);
}       
if (isset($_POST['usuario'])){
 $usuario = $_POST['usuario'];   
 $contra = $_POST['contrasena'];   
 $conectando = conectar();
 
 $sql = "SELECT * FROM USUARIOS where USUARIO = '$usuario' AND CONTRA = '$contra'";
    
    $logeado = mysqli_query($conectando, $sql);
    $fila = mysqli_fetch_row($logeado);
    
    if(mysqli_num_rows($logeado) > 0){
      
      $tipo= $fila[3]; 
      if($tipo === "ADMINISTRADOR"){ 
        echo("1");  
      }else{
        echo("0");      
      }
   
    }
}
?>
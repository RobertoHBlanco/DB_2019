<?php

function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="db2019_boletin";
    $con= mysqli_connect($server,$user,$pass) or die("Error al conectar"); 
    mysqli_select_db($con, $db);
    return $con;
}
?>


<?php
function Conectar(){
    if(!($conexion = mysqli_connect("localhost","root","","alasc"))){
        echo " Error conectando a la base de datos.";
    }
    return $conexion;
}
$conexion =Conectar();
?>
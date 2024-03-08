<?php

include 'conexion.php';
if (isset($_POST['edit'])) {
    $cedula = $_POST['cedu'];
    $nombre = $_POST['nomb'];
    $apellido = $_POST['apel'];
    $usuario = $_POST['user'];
    $contra = $_POST['cont'];
    $correo = $_POST['corr'];
    $direccion = $_POST['dire'];
    $ciudad = $_POST['ciud'];
    $genero = $_POST['gene'];
    $fecha = $_POST['fech'];



           $query="UPDATE usuario SET cedulaU='$cedula', nombre='$nombre', apellido='$apellido', password='$contra' , correo='$correo' , direccion='$direccion' , ciudad='$ciudad', genero='$genero', F_nacimiento='$fecha'
                    WHERE cedulaU=$cedula";
  $query= mysqli_query($query, $conexion) or die(mysql_error());
     

           echo '<script>
                        var msg = "Actualizacion Exitosa"
                        alert(msg);

                    </script>';
                    require 'perfil.php';





}
?>

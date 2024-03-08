<?php
session_start();
include 'conexion.php';

if (isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="utf-8"/>
            <title>Carrito de Compras</title>
            <link rel="stylesheet" type="text/css" href="./css/estilos.css">
            <script type="text/javascript"  href="./js/scripts.js"></script>
        </head>
        <body style="height: 100%;">


            <nav class="NavBar full">
                <div class="row">
                    <div class="tittles NavBar-logo col s12 m3" >Technology Store</div>
                    <ul class="NavBar-links col m9">
                        <li><a href="perfil.php" class="waves-effect" >PERFIL</a></li>
                        <li><a href="productos.php" class="waves-effect ">CATALOGO</a></li>
                        <li><a href="carritodecompras.php" class="waves-effect ">CARRO DE COMPRAS</a></li>
                        <li><a href="SesionExit.php" class="waves-effect modal-trigger">CERRAR SESION</a></li>

                    </ul>
                    <i class="zmdi zmdi-more-vert full btn-menu hide-on-med-and-up waves-effect"></i>
                </div>
            </nav>


            <?php
        } else {
            echo '<script> window.location="index.php";</script>';
        }
        ?>
        <?php
        include 'conexion.php';

        $result = mysqli_query($conexion," select * from usuario ");
        if ($row = mysqli_fetch_array($result))
            $fole = $row["nombre"];
        ?>

        <div class="contenido">


            <div class="derecha">
                <form action="Funcion.php" method="POST" id="datosP" >
                    <fieldset class="margen">
                        <h3 style="color:#16a09b;">Datos Personales</h3>
                        <input type="text" placeholder="Cedula" name="cedula" value="<?php echo $row['cedulaU']; ?>" style="width: 400px"required ><br>
                        <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $row['nombre']; ?>" style="width: 200px"required>
                        <input type="text" placeholder="apellido" name="apellido"value="<?php echo $row['apellido']; ?>" style="width: 200px"required><br>
                        <input type="text" placeholder="Ciudad" name="ciud"value="<?php echo $row['ciudad']; ?>" style="width: 200px"required>
                        <input type="text" placeholder="Direccion" name="dire"value="<?php echo $row['direccion']; ?>" style="width: 200px"required><br>
                        <h3 style="color:#16a09b;" >Metodo de Pago</h3>


                        <input type="text" placeholder="Tipo Tarjeta" name="TipoTarjeta" style= "width: 200px" required="">
                        <input maxlength="10" type="text" placeholder="Numero de Tarjeta" name="NumeroTarjeta" style="width: 200px" required=""><br>
                        <label for="fecha"  style=" text-align:center; font-size:11px;">Fecha de caducidad:

                            <input id="fecha" name="fec" type="date" class="validate"  style="width: 300px" required>

                            <input maxlength="4"type="text" placeholder="Codigo de Seguridad" name="CodigoSeguridad" style="width: 400px"required=""><br>
                            </fieldset>


                            </div>



                            <div class="tabla" style="font-family: monospace; font-size: 20px; color:#16a09b ;  width: 50%s">

                                <?php
                                include "conexion.php";

                                $arreglo = $_SESSION['carrito'];

                                $total = 0;
                                ?>
                                <center><h1>Productos</h1>

                                    <td>id</td>
                                    <td>Nombre</td>
                                    <td>Cantidad</td>
                                    <td>Precio</td>
                                    <td>Subtotal</td><br></center>

                                <?php
                                for ($i = 0; $i < count($arreglo); $i++) {
                                    ?>
                                    <center>
                                        <input type="text" placeholder="id" name="id" value="<?php echo $arreglo[$i]['Id']; ?>" style="width: 20px"required readonly="readonly">
                                        <input type="text" placeholder="nombre" name="nomb" value="<?php echo $arreglo[$i]['Nombre']; ?>" style="width: 80px"required readonly="readonly">
                                        <input type="text" placeholder="Cantidad" name="cant" value="<?php echo $arreglo[$i]['Cantidad']; ?>" style="width: 80px"required readonly="readonly">
                                        <input type="text" placeholder="Precio" name="prec" value="<?php echo $arreglo[$i]['Precio']; ?>" style="width: 80px"required readonly="readonly">
                                        <input type="text" placeholder="cantidad" name="canti" value="<?php echo $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']; ?>" style="width: 80px"required readonly="readonly"><br>

                                    </center>

                                    <?php
                                    $total = $total + ($arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']);

                                }




                                echo '<center><h2 ">Total: ' . $total . '</h2></center>';

                                ?>

                            </div>
            <div class="abajo">
                <center><button type="submit" name="buy" class="btn btn-primary">
                                        <i class="icon-user icon-white"></i> COMPRAR
                    </button></center>
                                <br></br>

                            </div>

                            </form>
                            </div>

                            </body>
                            </html>

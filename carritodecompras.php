<?php
session_start();
include './conexion.php';
if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id'])) {
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['Id'] == $_GET['id']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo;
        } else {
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $re = mysqli_query($conexion,"select * from productos where id=" . $_GET['id']);
            while ($f = mysqli_fetch_array($re)) {
                $nombre = $f['nombre'];
                $precio = $f['precio'];
                $imagen = $f['imagen'];
            }
            $datosNuevos = array('Id' => $_GET['id'],
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1);

            array_push($arreglo, $datosNuevos);
            $_SESSION['carrito'] = $arreglo;
        }
    }
} else {
    if (isset($_GET['id'])) {
        $nombre = "";
        $precio = 0;
        $imagen = "";
        $re = mysqli_query($conexion,"select * from productos where id=" . $_GET['id']);
        while ($f = mysqli_fetch_array($re)) {
            $nombre = $f['nombre'];
            $precio = $f['precio'];
            $imagen = $f['imagen'];
        }
        $arreglo[] = array('Id' => $_GET['id'],
            'Nombre' => $nombre,
            'Precio' => $precio,
            'Imagen' => $imagen,
            'Cantidad' => 1);
        $_SESSION['carrito'] = $arreglo;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Carrito de Compras</title>
        <link rel="stylesheet" type="text/css" href="./css/estilos.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript"  src="./js/scripts.js"></script>
    </head>
    <body>

        <header>
        </header>
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
        <p class="center-align" style="color: #2F9FF3;">
            <i class="zmdi zmdi-shopping-cart zmdi-hc-5x"></i>
        </p>
        <section>
            <?php
            $total = 0;
            if (isset($_SESSION['carrito'])) {
                $datos = $_SESSION['carrito'];

                $total = 0;
                for ($i = 0; $i < count($datos); $i++) {
                    ?>
                    <div class="producto">
                        <center>
                            <img  src="./productos/<?php echo $datos[$i]['Imagen']; ?>"><br>
                            <span ><?php echo $datos[$i]['Nombre']; ?></span><br>
                            <span>Precio: <?php echo $datos[$i]['Precio']; ?></span><br>
                            <span>Cantidad:
                                <input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
                                       data-precio="<?php echo $datos[$i]['Precio']; ?>"
                                       data-id="<?php echo $datos[$i]['Id']; ?>"
                                       class="cantidad">
                            </span><br>
                            <span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad'] * $datos[$i]['Precio']; ?></span>
                            <br></br>
                            <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id'] ?>">Eliminar</a>
                            <br></br>

                        </center>
                    </div>


                    <?php
                    $total = ($datos[$i]['Cantidad'] * $datos[$i]['Precio']) + $total;
                }
            } else {
                echo '<center><h2>CARRO DE COMPRAS VACIÓ</h2></center>';
            }
            echo '<center><h2 id="total">Total: ' . $total . '</h2></center>';
            if ($total != 0) {
                echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>;';
            }
            ?>
            <center><a href="productos.php">Añadir Producto</a></center>

        </section>
<!--        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col s12 m6">
                        <h5>Technology Store</h5>
                        <p>
                            Este es un sitio web diseñado por Andrés Muñoz para la compra de productos tecnologicos.
                        </p>
                    </div>
                    <div class="col s12 m6">
                        <h5 class="center-align">Contacto</h5>
                        <ul class="center-align">
                            <li><a href="#!"><i class="zmdi zmdi-facebook"></i> &nbsp; Facebook</a></li>
                            <li><a href="#!"><i class="zmdi zmdi-twitter"></i> &nbsp; Twitter</a></li>
                            <li><a href="#!"><i class="zmdi zmdi-google-plus"></i> &nbsp; Google+</a></li>

                        </ul>
                    </div>
                    <div class="col s12 tittles footer-copyright">Technology Store &copy; 2017</div>
                </div>
            </div>
        </footer>-->
    </body>
</html>

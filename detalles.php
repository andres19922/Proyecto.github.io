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
    <body>

        <nav class="NavBar full">
            <div class="row">
                <div class="tittles NavBar-logo col s12 m3" >Technology Store</div>
                <ul class="NavBar-links col m9">
                    <li><a href="perfil.php" class="waves-effect" >PERFIL</a></li>
                    <li><a href="productos.php" class="waves-effect ">CATALOGO</a></li>
                    <li><a href="SesionExit.php" class="waves-effect modal-trigger">CERRAR SESION</a></li>
                </ul>
                <i class="zmdi zmdi-more-vert full btn-menu hide-on-med-and-up waves-effect"></i>
            </div>
        </nav>

        <section>

            <?php
            include 'conexion.php';
            $re = mysqli_query($conexion,"select * from productos where id=" . $_GET['id'])or die(mysql_error());
            while ($f = mysqli_fetch_array($re)) {
                ?>
                <div class="detalle">
                    <center>
                        <img src="./productos/<?php echo $f['imagen']; ?>" width="20%" height="30%"><br>
                        <span><?php echo $f['nombre']; ?></span><br>
                        <span><?php echo $f['descripcion']; ?></span><br>
                        <span>Precio: <?php echo $f['precio']; ?></span>
                        <br></br>
                        <a href="./carritodecompras.php?id=<?php echo $f['id']; ?>" style="font-size: 20px" >Add to Cart</a>
                        <br></br>

                        <a href="./productos.php">Catalogo</a>
                    </center>

                </div>
                <?php
            }
            ?>

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
        <?php
}else{
         echo '<script>
                        var msg = "Debes estar Logueado"
                        alert(msg);

                    </script>';
	echo '<script> window.location="index.php";</script>';
}
?>
    </body>
</html>

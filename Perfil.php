<?php
session_start();
include 'conexion.php';
 $arreglo=$_SESSION['user'];

$password = 'cont';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;

 //$contrasena = $_POST['contrasena'];
//  $contrasena = hash('sha512',$contrasena);
if (isset($_SESSION['user'])) {
    ?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perfil</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/materialize.min.js" ></script>
        <script src="js/main.js" ></script>
    </head>
    <body>
         <?php
        include 'conexion.php';
        $result = mysqli_query($conexion, "select * from usuario where usuario='$arreglo'");
        if ($row = mysqli_fetch_array($result))

        ?>

        <form action="modificar.php" method="POST" id="RegModal" class="modal modal-fixed-footer" >
            <div class="modal-content">
                <h5 class="center-align">EDITAR</h5>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account-box prefix"></i>
                        <input maxlength="10" id="cedula" name="cedu" value="<?php echo $row['cedulaU']; ?>" type="text" class="validate"readonly="readonly" required>
                        <label for="cedula">Cedula</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account prefix"></i>
                        <input id="nombre" name="nomb" value="<?php echo $row['nombre']; ?>" type="text" class="validate"required>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account prefix"></i>
                        <input id="apellido" name="apel" value="<?php echo $row['apellido']; ?>" type="text" class="validate"required>
                        <label for="apellido">Apellido</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account prefix"></i>
                        <input id="nombre" name="user" value="<?php echo $row['usuario']; ?>" type="text" class="validate"readonly="readonly" required>
                        <label for="nombre">Usuario</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="zmdi zmdi-lock prefix"></i>
                        <input id="password" name="cont" type="password" value="<?php echo $row['password']; ?>"class="validate"required>
                        <label for="password">Contraseña</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account-box prefix"></i>
                        <input id="correo" name="corr" value="<?php echo $row['correo']; ?>"type="email" class="validate"required>
                        <label for="correo">Correo</label>
<!--                                        <i class="fa fa-envelope-open" aria-hidden="true"></i>-->
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account-box prefix"></i>
                        <input id="correo" name="dire" value="<?php echo $row['direccion']; ?>"type="text" class="validate"required>
                        <label for="correo">Direccion</label>
<!--                                        <i class="fa fa-envelope-open" aria-hidden="true"></i>-->
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account-box prefix"></i>
                        <input id="ciudad" name="ciud" value="<?php echo $row['ciudad']; ?>"type="text" class="validate"required>
                        <label for="ciudad">Ciudad</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account-box prefix"></i>
                        <input id="genero" name="gene" value="<?php echo $row['genero']; ?>"type="text" class="validate"required>
                        <label for="genero">Genero</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="zmdi zmdi-account-box prefix"></i>
                        <br></br>
                        <input id="fecha" name="fech" value="<?php echo $row['F_nacimiento']; ?>"type="date" class="validate"required>
                        <label for="fecha">Fecha Nacimiento</label>
                    </div>

                </div>

            </div>

            <div class="modal-footer" >
                <button type="submit" name="edit" class="btn btn-primary">
                    <i class="icon-user icon-white"></i> ENVIAR
                </button>


<!--                <input type="submit" name="reg" <a data-position="top" data-tooltip="Enviar"></a>-->

                <a href="#!" class="modal-action modal-close waves-effect btn-flat tooltipped" data-position="top" data-tooltip="Cancelar"><i class="zmdi zmdi-close"></i></a>


            </div>


        </form>
                <nav class="NavBar full">
            <div class="row">
                <div class="tittles NavBar-logo col s12 m3">Technology Store</div>
                <ul class="NavBar-links col m9">
                    <li><a href="productos.php" class="waves-effect" >CATALOGO</a></li>
                    <li><a href="carritodecompras.php" class="waves-effect" >CARRO DE COMPRAS</a></li>
                    <li><a href="#RegModal" class="waves-effect modal-trigger">EDITAR PERFIL</a></li>
                    <li><a href="SesionExit.php" class="waves-effect modal-trigger">CERRAR SESION</a></li>
                </ul>
                <i class="zmdi zmdi-more-vert full btn-menu hide-on-med-and-up waves-effect"></i>
            </div>
        </nav>
 <header class="full header valign-wrapper">
            <div class="container valign">
                <div class="row">
                    <div class="col s12 m6">
                        <figure>
                            <img src="assets/img/mac.jpg"  alt="Header" class="responsive-img center-box">
                        </figure>
                    </div>
                    <div class="col s12 m6">
                        <h5 class="tittles center-align">MacBook Pro</h5>
                        <p class="flow-text">
                            El Mac Pro es una estación de trabajo basada en la tecnología Intel Xeon lanzada
                            originalmente por Apple el 7 de agosto del 2006 en la WWDC, con el fin de reemplazar
                            al Power Mac G5, y en conjunto con el nuevo Xserve completar la transición de la compañía
                            hacia la plataforma Intel.
                        </p>
                    </div>
                </div>
            </div>
        </header>
        <section class="full new-prod">
            <h5 class="tittles center-align">PRODUCTOS MAS COMPRADOS</h5>
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l4">
                        <div class="card hoverable">
                            <figure class="card-image">
                                <img src="assets/img/mac.jpg" height="250px" width="250px" >
                                <figcaption class="card-title">Mac PRO</figcaption>
                            </figure>
                            <div class="card-content">
                                <p>
                                    Pantalla de 13,3 pulgadas (diagonal) retroiluminada por LED con tecnología IPS; resolución nativa de 2560 x 1600 a 227 pixeles por pulgada compatible con millones de colores
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="detalles.php?id=1">VER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card hoverable">
                            <figure class="card-image">
                                <img src="productos/iphone.jpg" height="250px" width="250px" >
                                <figcaption class="card-title">Iphone</figcaption>
                            </figure>
                            <div class="card-content">
                                <p>
                                    Pantalla Retina HD con 3D Touch
                                    Pantalla Retina HD de 4,7 pulgadas (diagonal) retroiluminada por LED
                                    Pantalla Multi-Touch con tecnología IPS
                                </p>
                            </div>
                            <div class="card-action">
                                <a href="detalles.php?id=3">VER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l4">
                        <div class="card hoverable">
                            <figure class="card-image">
                                <img src="productos/ipod.jpg" height="250px" width="250px" >
                                <figcaption class="card-title">Ipod</figcaption>
                            </figure>
                            <div class="card-content">
                                <p>
                                    Pantalla widescreen Multi-Touch de 4 pulgadas (diagonal) con tecnología IPS
                                    Resolución de 1136 x 640 pixeles a 326 ppi
                                    Relación de contraste 800:1 (normal)
                                    Brillo máximo de 500

                                </p>
                            </div>
                            <div class="card-action">
                                <a href="detalles.php?id=2">VER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="full promo">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h5 class="tittles center-align">Envios </h5>
                        <p>
                            Te damos todo resuelto. Recibirás la compra con el envío pago y el domicilio del comprador en una etiqueta lista para imprimir. ¡Tú solo lo despachas en Servientrega!
                        </p>
                    </div>
                    <div class="col s12 m4">
                        <p class="center-align">
                            <i class="zmdi zmdi-card-giftcard zmdi-hc-5x"></i>
                        </p>
                        <p class="center-align flow-text">Regalo Online</p>
                        <p>
                            Más de 327 Regalos para Hombres y Mujeres en Colombia a Domicilio Para Que Demuestres Tus Sentimientos Sin Salir de Tú Casa ¡Ahorra Tiempo!
                        </p>
                    </div>
                    <div class="col s12 m4">
                        <p class="center-align">
                            <i class="zmdi zmdi-card zmdi-hc-5x"></i>
                        </p>
                        <p class="center-align flow-text">Tarjeta</p>
                        <p>
                            Las tarjetas son medios de pago emitidos por una entidad financiera o un comercio. Por su comodidad, facilidad de uso, amplia aceptación y por la seguridad 
                        </p>
                    </div>
                    <div class="col s12 m4">
                        <p class="center-align">
                            <i class="zmdi zmdi-money zmdi-hc-5x"></i>
                        </p>
                        <p class="center-align flow-text">Efectivo</p>
                        <p>
                           Puedes conseguir tu tarjeta Pagoefectivo Visa sin tener una cuenta bancaria sólo con tu DNI totalmente gratis.
                        </p>
                    </div>
                </div>
            </div>
        </section>




   <?php
}else{
	echo '<script> window.location="index.php";</script>';
}
?>

            </body>
</html>

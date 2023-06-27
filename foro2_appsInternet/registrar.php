<?php
    include("conex.php");

    if (isset($_POST['register'])){

        if (
            strlen($_POST['nombre']) >= 1 &&
            strlen($_POST['descripcion']) >= 1 &&
            strlen($_POST['codigo']) >= 1 &&
            strlen($_POST['stock']) >= 1 &&
            strlen($_POST['precio']) >= 1
        ){
            $nombre = trim($_POST['nombre']);
            $descripcion = trim($_POST['descripcion']);
            $codigo = trim($_POST['codigo']);
            $stock = trim($_POST['stock']);
            $precio = trim($_POST['precio']);
            $consulta = "INSERT INTO ferreteros(nombre, descripcion, codigo, stock, precio)
            VALUES('$nombre', '$descripcion', '$codigo', '$stock', '$precio')";


            $resultado = mysqli_query($conex, $consulta);

            if ($resultado){
                ?>

                <h3 class="success mt-1">Su registro se ha completado</h3>

                <?php
            } else{
                ?>

                <h3 class="error">Ocurrió un error</h3>

                <?php
            }
         } else{
            ?>

            <h3 class="error">Llena todos los campos</h3>

            <?php
         }
    }
?>

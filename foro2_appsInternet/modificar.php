<?php
    include("conex.php");

    if (isset($_POST['mod'])){
        if (
            strlen($_POST['codigo']) >= 1 &&
            strlen($_POST['selec']) >= 1 &&
            strlen($_POST['valor']) >= 1
        ){
            $codigo = trim($_POST['codigo']);
            $selec = trim($_POST['selec']);
            $valor = trim($_POST['valor']);
            $consulta = "UPDATE ferreteros SET $selec='$valor' WHERE codigo='$codigo'";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado){
                ?>

                <h3 class="success mt-1">La modificación se ha realizado correctamente</h3>

                <?php
            } else{
                ?>

                <h3 class="error">Ocurrió un error al realizar la modificación</h3>

                <?php
            }
         } else{
            ?>

            <h3 class="error">Llena todos los campos</h3>

            <?php
         }
    }
?>
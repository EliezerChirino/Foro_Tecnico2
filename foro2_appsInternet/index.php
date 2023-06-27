<?php
include_once 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * from ferreteros";
$resultado =$conexion->prepare ($consulta);
$resultado->execute();
$data= $resultado ->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("registrar.php"); ?>
<?php include("modificar.php"); ?>
<?php include("eliminar.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalago de productos </title>

    <!--Bootstrap Y sus iconos al final-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--↓Iconos de bootstrap↓-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--↓Datatable↓-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!--↓Estilos css↓-->
<link rel="stylesheet" href="style.css">


</head>
<body>
<div class="container">  
  <h3 class="text-center">Catálogo de productos ferreteros </h3>
  <hr>
  <div class="botones d-flex justify-content-center ">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Modificar producto
      </button>
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal2">
        Eliminar producto
      </button>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal3">
        Agregar producto
      </button>
      <button type="button" class="btn btn-warning" onclick="actualizarTabla()">
    Actualizar la tabla
    </button>

    </div>
    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Descripción</th>
                <th>Codigo</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($data as $dat){
            ?>
            <tr>
                <td><?php echo $dat ['Nombre'] ?></td>
                <td><?php echo $dat ['descripcion'] ?></td>
                <td><?php echo $dat ['codigo'] ?></td>
                <td><?php echo $dat ['stock'] ?></td>
                <td><?php echo $dat ['precio'] ?></td>

            </tr>
            <?php
                }
                ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre del producto</th>
                <th>Descripción</th>
                <th>Codigo</th>
                <th>Stock</th>
                <th>Precio</th>
            </tr>
        </tfoot>
    </table>
   

</div>
<!--Modificar Producto-->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificar Producto</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="contenedor mt-2 mx-3">
            <form method="post" >  
                <h6 class="mt-3">Ingrese el codigo del producto a modificar</h6>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="bi bi-code"></i>
                        </div>
                        <input class="form-control" type="number" placeholder="Codigo del producto"  id="codigo" name="codigo" required  >
                    </div>

                    <h6 class="mt-3">Seleccione que desea modificar</h6>
                    <div class="input-group mt-1">
                        <div class="input-group-text">
                            <i class="bi bi-question"></i>
                         </div>
                         
                         <select class="form-select" id="selec" name="selec" > 
                             <option value="nombre">Nombre</option>
                             <option value="stock">stock</option>
                             <option value="precio">precio</option>
                             <option value="descripcion">descripcion</option>
                           </select>
                     </div>
                     <h6 class="mt-3">Ingrese el valor de la modificación</h6>
                     <div class="input-group">
                        <div class="input-group-text">
                            <i class="bi bi-code"></i>
                        </div>
                        <input class="form-control" type="text" placeholder="Valor"  id="valor" name="valor" required  >
                    </div>

                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="mod">Enviar</button>
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-center mt-3">

        </div>
  
      </div>
    </div>
  </div>

  <!--Eliminar Producto-->
  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Producto</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <div class="contenedor mt-2 mx-3">
            <form method="post">  
                <h6 class="mt-3">Ingrese el codigo del producto a Eliminar</h6>

                    <div class="input-group">
                        <div class="input-group-text">
                            <i class="bi bi-code"></i>
                        </div>
                        <input class="form-control" type="number" placeholder="Codigo del producto"  id="codigo" name="codigo" required  >
                    </div>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" name="delete">Eliminar</button>
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer mt-3">
          
        </div>
  
      </div>
    </div>
  </div>

  <!--Agregar Producto-->
  <div class="modal" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Producto</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="contenedor mt-2 mx-3">
        <form method="post" >  
    <h6 class="mt-3">Ingrese el codigo del producto</h6>
    <div class="input-group">
        <div class="input-group-text">
            <i class="bi bi-code"></i>
        </div>
        <input class="form-control" type="number" placeholder="Codigo del producto"  id="codigo" name="codigo" required>
    </div>

    <h6 class="mt-3">Ingrese el Nombre del producto</h6>
    <div class="input-group">
        <div class="input-group-text">
            <i class="bi bi-code"></i>
        </div>
        <input class="form-control" type="text" placeholder="Nombre del producto"  id="nombre" name="nombre" required>
    </div>

    <h6 class="mt-3">Ingrese la descripción del producto</h6>
    <div class="input-group">
        <div class="input-group-text">
            <i class="bi bi-code"></i>
        </div>
        <input class="form-control" type="text" placeholder="Descripción"  id="descripcion" name="descripcion" required>
    </div>

    <h6 class="mt-3">Ingrese el Stock del producto</h6>
    <div class="input-group">
        <div class="input-group-text">
            <i class="bi bi-code"></i>
        </div>
        <input class="form-control" type="text" placeholder="Stock"  id="Stock" name="stock" required>
    </div>

    <h6 class="mt-3">Ingrese el precio del producto</h6>
    <div class="input-group">
        <div class="input-group-text">
            <i class="bi bi-code"></i>
        </div>
        <input class="form-control" type="text" placeholder="Precio"  id="precio" name="precio" required>
    </div>

    <button type="submit" class="btn btn-success" name= " register" data-bs-dismiss="modal">Agregar</button>
</form>
          
      </div>
  
        <!-- Modal footer -->
        <div class="modal-footer mt-4">
          
        </div>
  
      </div>
    </div>
  </div>

<!--Script de Bootstrap y Jquery-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!--↓Script para el datatable↓-->
<script>  
  $(document).ready(function () {
    $('#example').DataTable();
});

</script> 

<script>
    function actualizarTabla() {
        location.reload();
    }
</script>

</body>
</html>




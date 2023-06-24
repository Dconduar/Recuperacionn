<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Introduccion a los sistemas de computo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <?php 
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $conexion = new PDO('mysql:host=localhost;dbname=recuperacion_0907_23_8207', 'root', '', $pdo_options);
    
    if (isset($_POST["accion"])){
      //  echo "Quieres " . $_POST["accion"];
        if ($_POST["accion"] == "Crear"){
            $instert = $conexion->prepare("INSERT INTO producto (codigo,nombre,precio, existencia) VALUES
            (:codigo,:nombre,:precio,:existencia)");
            $instert->bindValue('codigo', $_POST['codigo']);
            $instert->bindValue('nombre', $_POST['nombre']);
            $instert->bindValue('precio', $_POST['precio']);
            $instert->bindValue('existencia', $_POST['existencia']);
            $instert->execute();    

        }
    }

    $select = $conexion->query("SELECT codigo, nombre, precio, existencia FROM producto");

    

    ?>
    <div class="container mt-3">
        <div class="w-100 text-center" >
            <img src="logo.png" width="100px" alt="">
        </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                  <h1>Registro de Producto</h1>
                </div>  
            
            </div>
        <form method="POST"> 
            <div class="row">
                <div class="col-6">
                <input type="text" name="nombre" placeholder="Ingresa el codigo" class="form-control d-block"/>

                </div>
                <div class="col-6">
                    <input type="text" name="carnet" placeholder="Ingresa el nombre" class="form-control d-block"/>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <input type="text" name="dpi" placeholder="Ingresa el precio" class="form-control d-block"/>
                </div>
                <div class="col-6">
                    <input type="text" name="direccion" placeholder="Ingresa la existencia" class="form-control d-block"/>
                </div>
            </div>
    
            <input type="hidden" name="accion" value="Crear"/>
            <div class="row mt-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">Crear</button>
                </div>
            
            </div>
        </form>

    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Existencia</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($select->fetchAll() as $producto) { ?>
            <tr>
                <td> <?php echo $producto["codigo"] ?> </td>
                <td> <?php echo $producto["nombre"] ?> </td>
                <td> <?php echo $producto["precio"] ?> </td>
                <td> <?php echo $producto["existencia"] ?> </td>
                <td> <form method="POST"><button type="submit" class="btn btn-info">Editar</button> 
                <input type="hidden" value="Editar"/>
                <input type="hidden" value="<?php echo $producto["codigo"] ?>"/>
                </form>
            </tr>

        <?php } ?>
  
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
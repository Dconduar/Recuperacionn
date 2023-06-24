<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Introduccion a los sistemas de computo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION; 
        $conexion = new PDO('mysql:host=localhost;dbname=recuperacion_0907_23_8207', 'root', '', $pdo_options);
    
    
            $select = $conexion->query("SELECT Codigo, Nombre, Precio, Existencia FROM producto");
    ?>
    
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Existencia</th>

        </tr>
        <?php foreach($select->fetchAll() as $producto) { ?>
            <tr>
                <td> <?php echo $producto["Codigo"] ?> </td>
                <td> <?php echo $producto["Nombre"] ?> </td>
                <td> <?php echo $producto["Precio"] ?> </td>
                <td> <?php echo $producto["Existencia"] ?> </td>


                </form>
            </tr>

        <?php } ?>

</body>
</html>
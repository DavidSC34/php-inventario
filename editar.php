<?php 
    include 'conexion.php';
    $id = $con-> real_escape_string( htmlentities($_GET['id']));
    $sel = $con->query("SELECT  id,producto,precio,cantidad,categoria  FROM inventario WHERE id='$id' ");
    if ($f = $sel->fetch_assoc()) {
       } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>CRUD</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-info">
            <a href="/" class="navbar-brand">CRUD</a>
        </nav>
    </header>
    <div class="container" style="padding-top: 30px;">
        <form action="actualizar.php" method="post">
            <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $f['id'];?> ">
                <input type="text" name="producto" placeholder="Producto" class="form-control" value="<?php echo $f['producto'];?>">
            </div>
            <div class="form-group">
                <input type="numer" name="precio" placeholder="Precio" step="0.01" class="form-control" value="<?php echo $f['precio'];?>">
            </div>
            <div class="form-group">
                <input type="number" name="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $f['cantidad'];?>">
            </div>
            <div class="form-group">
                <input type="text" name="categoria" placeholder="Categoria" class="form-control" value="<?php echo $f['categoria'];?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Editar" class="btn btn-info">
            </div>
        </form>
        <!-- <a href="guardar.php?producto=cocacola">Enviar</a> -->
    </div>
    
</body>

</html>
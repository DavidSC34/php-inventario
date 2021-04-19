<?php 
include 'conexion.php';
    $sel = $con->query("SELECT  id,producto,precio,cantidad,categoria  FROM inventario");
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
        <nav class="navbar navbar-light bg-warning">
            <a href="/" class="navbar-brand">CRUD</a>
        </nav>
    </header>
    <div class="container" style="padding-top: 30px;">
        <form action="guardar.php" method="post">
            <div class="form-group">
           
                <input type="text" name="producto" placeholder="Producto" class="form-control">
            </div>
            <div class="form-group">
                <input type="numer" name="precio" placeholder="Precio" step="0.01" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="cantidad" placeholder="Cantidad" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="categoria" placeholder="Categoria" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-info">
            </div>
        </form>
        <!-- <a href="guardar.php?producto=cocacola">Enviar</a> -->
    </div>
    <div class="container">
       <table class="table">
       <th>Producto</th>
       <th>Precio</th>
       <th>Cantidad</th>
       <th>Categoria</th>
       <th>Editar</th>
       <th>Eliminar</th>
       <tbody>
       <?php while($f = $sel->fetch_assoc()){ ?>
         <tr>
                <td><?php echo $f['producto'];?></td>
                <td><?php echo "$".number_format($f['precio'],2);?></td>
                <td><?php echo $f['cantidad'];?></td>
                <td><?php echo $f['categoria'];?></td>
                <td><a href="editar.php?id=<?php echo $f['id']; ?>" class="btn btn-warning">Editar</a></td>
                <td><a href="eliminar.php?id=<?php echo $f['id']; ?>" class="btn btn-danger">Editar</a></td>
         </tr>
         <?php  }?>
       </tbody>
       </table>
    </div>
</body>

</html>
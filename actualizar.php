<?php
include 'conexion.php';

//verifica si ldatos viene de un formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'];
    $precio = htmlentities($_POST['precio']);
    $cantidad = $con->real_escape_string(htmlentities($_POST['cantidad']));
    $categoria = $con->real_escape_string(htmlentities($_POST['categoria']));
    $id = $con->real_escape_string(htmlentities($_POST['id']));


    //FORMA  NORMAL
    //$up = $con->query("UPDATE inventario SET  producto='$producto', precio='$precio', categoria='$categoria', cantidad='$cantidad' WHERE id= $id ");
  
    //FROMA PREPARADA

    $up = $con->prepare("UPDATE inventario SET  producto=?, precio=?, categoria=?, cantidad=? WHERE id= ? ");
    $up->bind_param('sdsii',$producto,$precio,$categoria,$cantidad,$id);
    if ($up->execute()) {
        header("location:index.php");
    } else {

        echo "no edito";
    }

    //optimizar con la conexion 
   $up->close();
    $con->close();
} else {
    header("location:index.php");
}

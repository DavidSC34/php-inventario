<?php
include 'conexion.php';

//verifica si ldatos viene de un formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'];
    $precio = htmlentities($_POST['precio']);
    $cantidad = $con->real_escape_string(htmlentities($_POST['cantidad']));
    $categoria = $con->real_escape_string(htmlentities($_POST['categoria']));

    //forma completa
    $ins = $con->query("INSERT INTO  inventario (id,producto,precio,cantidad) VALUES (DEFAULT,'$producto','$precio','$cantidad')");

    //FORMA CORTA

    // $ins = $con->query("INSERT INTO  inventario  VALUES (DEFAULT,'$producto','$precio','$cantidad',NULL)");



    if ($ins) {
        echo "guarda";
    } else {

        echo "no guardo";
    }
} else {
    header("location:index.php");
}

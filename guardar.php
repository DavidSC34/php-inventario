<?php
include 'conexion.php';

//verifica si ldatos viene de un formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'];
    $precio = htmlentities($_POST['precio']);
    $cantidad = $con->real_escape_string(htmlentities($_POST['cantidad']));
    $categoria = $con->real_escape_string(htmlentities($_POST['categoria']));

    $id = '';

    //forma completa
    //$ins = $con->query("INSERT INTO  inventario (id,producto,precio,cantidad) VALUES (DEFAULT,'$producto','$precio','$cantidad')");

    //FORMA CORTA

    // $ins = $con->query("INSERT INTO  inventario  VALUES (DEFAULT,'$producto','$precio','$cantidad',NULL)");


    //CONSULTA  PREPARADA
   $ins = $con->prepare("INSERT INTO inventario VALUES (?,?,?,?,?) ");
   $ins->bind_param('isdis',$id,$producto,$precio,$cantidad,$categoria);//tipo de dato, variables con el dato

    if ($ins->execute()) {
        header("location:index.php");
    } else {

        echo "no guardo";
    }

    //optimizar con la conexion 
    $ins->close();
    $con->close();
} else {
    header("location:index.php");
}

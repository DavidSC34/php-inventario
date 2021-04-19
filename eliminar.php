<?php
   include 'conexion.php';

   $id = htmlentities($_GET['id']);

   //$del = $con->query("DELETE FROm inventario WHRER id='$id'");

   //FROMA PREPARADA
   $del = $con->prepare("DELETE FROM inventario WHRER id=? ");
   $del->bind_param('i',$id);

   if($del->execute()){
   header('location:index.php');
   }else{
       echo "no borro";
   }
?>
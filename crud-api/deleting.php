<?php
require ('../headers/header.php');
$id=$_GET['id'];
$access->locate($pdo,$id,'products');
$access->deleting($pdo,$id,'products','../product_managment/view_pdt.php');

?>

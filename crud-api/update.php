<?php
require ('../headers/header.php');
$id=$_GET['id'];
$access->locate($pdo,$id,'products');
$dataling=$access->locate($pdo,$id,'products');

  

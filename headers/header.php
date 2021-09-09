<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-type: application/json');
session_start();
include ('../crud-api/crud.php');
$access=new Crud();
$access->dbconnect('localhost','pdt_managment','root','');

//for display still access the registering database
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../assests/css/bootstrap/bootstrap.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="../login/traveller.css" type="text/css"> -->

    <!-- <script src="../assests/js/bootstrapjs/bootstrap.bundle.min.js"></script> -->

    <title>Product managment</title>
</head>
<body >

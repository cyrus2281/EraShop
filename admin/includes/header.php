<?php
ob_start();
session_start();
include "../includes/db.php";
include "functions.php";
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="This is a sample website simulating an online retail laptop store" />
    <meta name="keywords" content="shop, online, onlineshop, laptop, computer" />
    <meta name="author" content="Milad Mobini" />
    <!-- style css -->
    <link rel="stylesheet" href="../css/styles.css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="../img/era-shop-favicon.ico" type="image/x-icon" />
    <!-- font awesome -->
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.min.css" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&family=Lora:ital,wght@0,600;1,400&display=swap" rel="stylesheet" />
    <!-- admin CSS  -->
    <link rel="stylesheet" href="css/admin.css">
    <title>Era Shop || Admin </title>
</head>
<body>


<?php
session_start();
include 'includes/db.php';

$id = $_POST['id'];

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id] += 1;
} else {
    $_SESSION['cart'][$id] = 1;
}

header("Location: index.php");
exit;

?>
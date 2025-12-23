<?php
session_start();

if(!isset($_POST['id']) || !isset($_POST['action'])){
    header("Location: index.php");
    exit;
}

$id = $_POST['id'];
$action = $_POST['action'];

// Check cart exists
if(!isset($_SESSION['cart'][$id])){
    header("Location: index.php");
    exit;
}

// Increase / Decrease logic
if($action == "increase"){
    $_SESSION['cart'][$id] += 1;
} elseif($action == "decrease"){
    $_SESSION['cart'][$id] -= 1;

    // Remove from cart if qty <= 0
    if($_SESSION['cart'][$id] <= 0){
        unset($_SESSION['cart'][$id]);
    }
}

// Redirect back
header("Location: index.php");
exit;

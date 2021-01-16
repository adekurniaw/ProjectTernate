<?php

var_dump ($_POST);
include '../system/loader.php';
include '../system/session.php';
include "../system/conn.php";
$conn= koneksi();
session();
$user=$_SESSION['username'];
// echo "berhasil menambahkan".$productName["productName"];

if ($_POST['action']=='add'){
  $itemId=  $_POST['cartId'];
  $cart= mysqli_query($conn, "SELECT * FROM carts WHERE username ='$user'");
  $cartData = mysqli_fetch_assoc($cart);
  $code = $user . date("m-d-Y");
  if (empty($cartData)){
    echo "empty";
    mysqli_query($conn, "INSERT INTO carts VALUES (0, '$user', 0 , '$code')");
    $cart= mysqli_query($conn, "SELECT * FROM carts WHERE username ='$user'");
    $cartData = mysqli_fetch_assoc($cart);
    $cartId = $cartData["id"];
    echo mysqli_error($conn);
  } else {
    $cartId = $cartData["id"];
  }
  mysqli_query($conn, "INSERT INTO cartDetails VALUES (0, '$cartId',  1 , '$itemId')"); 
  $q=mysqli_query($conn, "SELECT productName FROM products WHERE id=$itemId");
  $productName=mysqli_fetch_assoc($q);
} elseif($_POST['action']=='delete') {
  $cart= mysqli_query($conn, "SELECT * FROM carts WHERE username ='$user'");
  $cartData = mysqli_fetch_assoc($cart);
  $cartId = $cartData["id"];
  $remove=$_POST['proId'];
  mysqli_query($conn, "DELETE FROM cartDetails WHERE id = $remove AND cartId = $cartId");
}


?>
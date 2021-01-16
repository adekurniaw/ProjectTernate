<?php
include 'system/session.php';
include 'system/conn.php';
session();
$date=date('Y-m-d');
$conn= koneksi();
$user=$_SESSION['username'];
$cart= mysqli_query($conn, "SELECT * FROM carts WHERE username ='$user'");
$cartData = mysqli_fetch_assoc($cart);
$cartId = $cartData["id"];
$q=mysqli_query($conn, "SELECT products.productName, products.productPrice, cartDetails.id, (COUNT(products.productName)) AS qty  FROM cartDetails INNER JOIN products ON cartDetails.item_Id=products.id WHERE cartId=$cartId 
GROUP by productName");
$tot= mysqli_query($conn, "SELECT SUM(productPrice) as tot FROM cartDetails INNER JOIN products ON cartDetails.item_Id=products.id WHERE cartId=$cartId");
$total=mysqli_fetch_assoc($tot);
$bayar=$total['tot'];
$nama= $_POST['name'];
$alamat=$_POST['alamat'];
$telp= $_POST['phone'];
if (isset($_POST['submit'])) {
  $code=mt_rand();
  // $a=mysqli_fetch_assoc($q);
  // $item=$a['productName'];
  while ($cekout=mysqli_fetch_assoc($q)) {
    # code...
    $proname=$cekout['productName'];
    $qty=$cekout['qty'];
    $price=$cekout['productPrice'];
    mysqli_query($conn, "INSERT INTO checkout VALUES (0,'$code', '$date', '$cartId' , '$nama','$alamat', '$telp','$proname', $qty,'$price')");  
  }
  mysqli_query($conn,"DELETE FROM cartDetails WHERE cartId=$cartId");
  header("location:https://api.whatsapp.com/send?phone=628114324389&text=Kode%20Pesanan=".$code."%0ATotal=".$bayar."%0ANama%20:".$nama."%0AAlamat%20:%20".$alamat."%0ANo.Telp%20:%20".$telp);
}

?>
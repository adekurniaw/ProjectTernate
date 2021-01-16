<?php
include '../system/conn.php';
$conn= koneksi();
if (isset($_POST["submit"])) {
  # code...
  $code = $_POST["code"];
  $cek=TRUE;
  $query = mysqli_query($conn,"SELECT * FROM checkout WHERE ordercode='$code'");
}?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <title>Admin</title>
  <style>
  .container{
    max-width:450px;
  }
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  }
  </style>
</head>
<body>
<div class="container">
  <div class="row text-center">
  <p>Masukkan Kode Pesanan Customer</p>
    <form action="" method="post">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Kode Pesanan", name="code" require="required">        
    </div>
      <button type="submit" class="btn btn-info" name="submit">Cek</button>
    </form>
  </div>
  <?php

  if (isset($cek)) {
    # code...
  echo  "<table>";
  echo "<tr>";
  echo "<th>Barang</th>";
  echo "<th>Harga</th>";
  echo "<th>Qty</th>";
  echo "</tr>";
  while($res=mysqli_fetch_assoc($query)){
    ?>
   
      <tr>
        <td><?php echo $res['productName'] ?></td>
        <td><?php echo $res['price'] ?></td>
        <td><?php echo $res['qty'] ?></td> 
      </tr>
    
    <?php
    }
  echo "</table>";
  $tot= mysqli_query($conn, "SELECT SUM(price*qty) as tot,nama,alamat,phone FROM checkout WHERE ordercode=$code");
  while($total=mysqli_fetch_assoc($tot)){
    ?>
    <p class="text-center">Total = <?php echo $total['tot']?></p>
    <p>Nama = <?php echo $total['nama']?></p>
    <p>Alamat = <?php echo $total['alamat']?></p>
    <p>No. Telp = <?php echo $total['phone']?></p>
    
    <?php
  }

}
?>



</div>



</body>
</html>
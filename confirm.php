<?php
include 'system/session.php';
include 'system/conn.php';
session();
$conn= koneksi();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/confirm.css">
  <title>Confirm</title>
</head>
<body>
  <div class="container text-center">
    <div class="tabel"> 
    <h4>Please Confirm Your Order</h4>
    <?php
      $user=$_SESSION['username'];
      $cart= mysqli_query($conn, "SELECT * FROM carts WHERE username ='$user'");
      $cartData = mysqli_fetch_assoc($cart);
      $cartId = $cartData["id"];
      $q=mysqli_query($conn, "SELECT products.productName, (sum(products.productPrice)) AS productPrice, cartDetails.id, (COUNT(products.productName)) AS qty  FROM cartDetails INNER JOIN products ON cartDetails.item_Id=products.id WHERE cartId=$cartId 
      GROUP by productName" );
      // $product=mysqli_fetch_assoc($q);
      $tot= mysqli_query($conn, "SELECT SUM(productPrice) as tot FROM cartDetails INNER JOIN products ON cartDetails.item_Id=products.id WHERE cartId=$cartId");
      // $total=mysqli_fetch_assoc($tot);
      

      echo  "<table>";
      echo "<tr>";
      echo "<th>Barang</th>";
      echo "<th>Harga</th>";
      echo "<th>Qty</th>";
      echo "</tr>";
      while($result=mysqli_fetch_assoc($q)){
    ?>
   
      <tr>
        <td><?php echo $result['productName'] ?></td>
        <td><?php echo $result['productPrice'] ?></td>
        <td><?php echo $result['qty'] ?></td> 
      </tr>
    
    <?php
    }
    echo "</table>";
    while($total=mysqli_fetch_assoc($tot)){
      
    ?>
    <p>Total = <?php echo $total['tot']?></p>
      
    <?php
    }
    
    ?>
    </div>
    <div class="row text-center">
      <form action="cekout.php" method="post">
        <p class="hint-text"><strong>Masukkan Data Penerima</strong></p>
        <div class="form-group"> 
          <!-- <label for="name">Nama Penerima</label> -->
          <input type="text" class="form-control" name="name" placeholder="Nama Penerima" required="required" id="name"> 	
        </div>
        <div class="form-group"> 
          <!-- <label for="alamat">Alamat Penerima</label> -->
          <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required" id="alamat"> 	
        </div>
        <div class="form-group"> 
          <!-- <label for="phone">No Telp. Penerima</label> -->
          <input type="text" class="form-control" name="phone" placeholder="Nomor Penerima" required="required" id="phone"> 	
        </div>
        <h5>Screenshoot Halaman Ini sebelum menekan tombol dibawah</h5>
        <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Order</button>
        
      </form>
    </div>
  </div>



</body>
</html>
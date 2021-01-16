<?php
include 'system/session.php';
include 'system/functionConn.php';
include 'system/conn.php';
session();
$conn= koneksi();
if (isset($_POST['logout'])) {
  # code...
  session_destroy();
  header('location : /view/signin.php');
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengo Camp</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/rent.css">  
    <script src="../bootstrap/js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="nav-bar">
        <button onClick="document.getElementById('Tenda').scrollIntoView();" id="ProfileBtn" title="Go to Tenda section">
          Tenda
        </button> 
        <button onClick="document.getElementById('Cooking').scrollIntoView();" id="ExpBtn" title="Go to Cooking set section">
          Cooking Set
        </button> 
        <button onClick="document.getElementById('Backpack').scrollIntoView();" id="AblBtn" title="Go to Backpack section">
          BackPack
        </button> 
        <button onclick="document.getElementById('Shoes').scrollIntoView();" id="PortoBtn" title="Go to Shoes section">
          Shoes
        </button> 
        <button onclick="document.getElementById('Lighting').scrollIntoView();" id="ConBtn" title="Go to Lighting section">
          Lighting
        </button>
        <button onclick="document.getElementById('Sleeping').scrollIntoView();" id="ConBtn" title="Go to Others section">
          Sleeping Set
        </button>  
        <button onclick="document.getElementById('Others').scrollIntoView();" id="ConBtn" title="Go to Others section">
          Others
        </button> 
    </div>
    <div class="log-btn">
      <form action="" method="post">
        <button type='submit' name='logout'>LOG OUT</button>
      </form>
      <?php
      $admin=$_SESSION["username"];
      if ($admin =='wawan'){
      ?>
        <a href="view/admin.php" class="btn btn-default" id="tenda01" name = "tenda01">Admin</a>
      <?php
      }
      ?>
    </div>
    
  <div class="container2 col-sm-12">
    <div class="text-center">
        <a href="Index.html">
          <img src="../Image/logo3.png" alt="Logo BengoCamp" class="logo">

        </a>
      <div class="row product"> 

        <!-- Section Tednda -->
        <section id="Tenda" class="col-sm-8 col-sm-offset-2">
          <div class="row">
            <div class="text-left">
              <H2>Tenda</H2>
            </div>
            
          </div>
          <div class="row">
          <?php 
                  
                  $q=mysqli_query($conn, "SELECT * FROM products WHERE kategoriId=4" );
                  while($product=mysqli_fetch_assoc($q)){
                  
                ?>
          
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="<?php echo $product["filename"]  ?>" alt="...">
                <div class="caption">
                  <h3><?php echo $product["productName"]?></h3>
                  <div class="row">
                    <p class="spek col-sm-7 text-left"> <?php echo $product["productInfo"]?> <br> <?php echo $product["productInfo2"]?>
                    </p>
                    <p class="price col-sm-5 text-right">Rp. <?php echo $product["productPrice"]?></p>
                  </div>
                  <div class="row">
                  
                    
                    <!-- <a href="class="btn btn-default" >add to cart</a> -->
                    <button class="btn btn-primary add" data-id="<?php echo $product["id"]?>">add to cart</button>
                    <!-- <a class="btn btn-primary" id="tenda01" name = "tenda01"> Add to Cart 1</a> -->
                    <!-- <a href="#" class="btn btn-primary" type="submit" >Rent</a>  -->
                    <!-- <a href="confirm.php" class="btn btn-default" type="submit"  name="tenda01" >Rent</a> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  }
                  
                ?>
            </div>
        </section>
        <!-- akhir section tenda-->
        
        <!-- Section Cooking Set -->
        <section id="Cooking" class="col-sm-8 col-sm-offset-2">
          <div class="row">
            <div class="text-left">
              <H2>Cooking Set</H2>
            </div>
            
          </div>
          <div class="row">
          <?php
                  
                  $q=mysqli_query($conn, "SELECT * FROM products WHERE kategoriId=5" );
                  while($product=mysqli_fetch_assoc($q)){
                  
                ?>
          
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="<?php echo $product["filename"]  ?>" alt="...">
                <div class="caption">
                  <h3><?php echo $product["productName"]?></h3>
                  <div class="row">
                    <p class="spek col-sm-7 text-left"> <?php echo $product["productInfo"]?> <br> <?php echo $product["productInfo2"]?>
                    </p>
                    <p class="price col-sm-5 text-right">Rp. <?php echo $product["productPrice"]?></p>
                  </div>
                  <div class="row">
                  
                    
                    <!-- <a href="class="btn btn-default" >add to cart</a> -->
                    <button class="btn btn-primary add" data-id="<?php echo $product["id"]?>">add to cart</button>
                    <!-- <a class="btn btn-primary" id="tenda01" name = "tenda01"> Add to Cart 1</a> -->
                    <!-- <a href="#" class="btn btn-primary" type="submit" >Rent</a>  -->
                    <!-- <a href="confirm.php" class="btn btn-default" type="submit"  name="tenda01" >Rent</a> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  }
                  
                ?>
            </div>
        </section>
        <!-- akhir section Cooking Set-->
       
        <!-- Section BackPack -->
        <section id="Backpack" class="col-sm-8 col-sm-offset-2">
          <div class="row">
            <div class="text-left">
              <H2>Backpack</H2>
            </div>
            
          </div>
          <div class="row">
          <?php
                  
                  $q=mysqli_query($conn, "SELECT * FROM products WHERE kategoriId=6" );
                  while($product=mysqli_fetch_assoc($q)){
                  
                ?>
          
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="<?php echo $product["filename"]  ?>" alt="...">
                <div class="caption">
                  <h3><?php echo $product["productName"]?></h3>
                  <div class="row">
                    <p class="spek col-sm-7 text-left"> <?php echo $product["productInfo"]?> <br> <?php echo $product["productInfo2"]?>
                    </p>
                    <p class="price col-sm-5 text-right">Rp. <?php echo $product["productPrice"]?></p>
                  </div>
                  <div class="row">
                  
                    
                    <!-- <a href="class="btn btn-default" >add to cart</a> -->
                    <button class="btn btn-primary add" data-id="<?php echo $product["id"]?>">add to cart</button>
                    <!-- <a class="btn btn-primary" id="tenda01" name = "tenda01"> Add to Cart 1</a> -->
                    <!-- <a href="#" class="btn btn-primary" type="submit" >Rent</a>  -->
                    <!-- <a href="confirm.php" class="btn btn-default" type="submit"  name="tenda01" >Rent</a> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  }
                  
                ?>
            </div>
        </section>
        <!-- akhir backpack Set-->        

        <!-- Section Shoes -->
        <section id="Shoes" class="col-sm-8 col-sm-offset-2">
          <div class="row">
            <div class="text-left">
              <H2>Shoes</H2>
            </div>
            
          </div>
          <div class="row">
          <?php
                  
                  $q=mysqli_query($conn, "SELECT * FROM products WHERE kategoriId=7" );
                  while($product=mysqli_fetch_assoc($q)){
                  
                ?>
          
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="<?php echo $product["filename"]  ?>" alt="...">
                <div class="caption">
                  <h3><?php echo $product["productName"]?></h3>
                  <div class="row">
                    <p class="spek col-sm-7 text-left"> <?php echo $product["productInfo"]?> <br> <?php echo $product["productInfo2"]?>
                    </p>
                    <p class="price col-sm-5 text-right">Rp. <?php echo $product["productPrice"]?></p>
                  </div>
                  <div class="row">
                  
                    
                    <!-- <a href="class="btn btn-default" >add to cart</a> -->
                    <button class="btn btn-primary add" data-id="<?php echo $product["id"]?>">add to cart</button>
                    <!-- <a class="btn btn-primary" id="tenda01" name = "tenda01"> Add to Cart 1</a> -->
                    <!-- <a href="#" class="btn btn-primary" type="submit" >Rent</a>  -->
                    <!-- <a href="confirm.php" class="btn btn-default" type="submit"  name="tenda01" >Rent</a> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  }
                  
                ?>
            </div>
        </section>
        <!-- akhir Shoes Set-->  

        <!-- Section Lighting -->
        <section id="Lighting" class="col-sm-8 col-sm-offset-2">
          <div class="row">
            <div class="text-left">
              <H2>Lighting</H2>
            </div>
            
          </div>
          <div class="row">
          <?php
                  
                  $q=mysqli_query($conn, "SELECT * FROM products WHERE kategoriId=8" );
                  while($product=mysqli_fetch_assoc($q)){
                  
                ?>
          
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="<?php echo $product["filename"]  ?>" alt="...">
                <div class="caption">
                  <h3><?php echo $product["productName"]?></h3>
                  <div class="row">
                    <p class="spek col-sm-7 text-left"> <?php echo $product["productInfo"]?> <br> <?php echo $product["productInfo2"]?>
                    </p>
                    <p class="price col-sm-5 text-right">Rp. <?php echo $product["productPrice"]?></p>
                  </div>
                  <div class="row">
                  
                    
                    <!-- <a href="class="btn btn-default" >add to cart</a> -->
                    <button class="btn btn-primary add" data-id="<?php echo $product["id"]?>">add to cart</button>
                    <!-- <a class="btn btn-primary" id="tenda01" name = "tenda01"> Add to Cart 1</a> -->
                    <!-- <a href="#" class="btn btn-primary" type="submit" >Rent</a>  -->
                    <!-- <a href="confirm.php" class="btn btn-default" type="submit"  name="tenda01" >Rent</a> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  }
                  
                ?>
            </div>
        </section>
        <!-- akhir Lighting Set-->  

        <!-- Section Sleeping -->
        <section id="Sleeping" class="col-sm-8 col-sm-offset-2">
          <div class="row">
            <div class="text-left">
              <H2>Sleeping Set</H2>
            </div>
            
          </div>
          <div class="row">
          <?php
                  
                  $q=mysqli_query($conn, "SELECT * FROM products WHERE kategoriId=9" );
                  while($product=mysqli_fetch_assoc($q)){
                  
                ?>
          
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="<?php echo $product["filename"]  ?>" alt="...">
                <div class="caption">
                  <h3><?php echo $product["productName"]?></h3>
                  <div class="row">
                    <p class="spek col-sm-7 text-left"> <?php echo $product["productInfo"]?> <br> <?php echo $product["productInfo2"]?>
                    </p>
                    <p class="price col-sm-5 text-right">Rp. <?php echo $product["productPrice"]?></p>
                  </div>
                  <div class="row">
                  
                    
                    <!-- <a href="class="btn btn-default" >add to cart</a> -->
                    <button class="btn btn-primary add" data-id="<?php echo $product["id"]?>">add to cart</button>
                    <!-- <a class="btn btn-primary" id="tenda01" name = "tenda01"> Add to Cart 1</a> -->
                    <!-- <a href="#" class="btn btn-primary" type="submit" >Rent</a>  -->
                    <!-- <a href="confirm.php" class="btn btn-default" type="submit"  name="tenda01" >Rent</a> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  }
                  
                ?>
            </div>
        </section>
        <!-- akhir Sleeping-->  

        <!-- Section Sleeping -->
        <section id="Others" class="col-sm-8 col-sm-offset-2">
          <div class="row">
            <div class="text-left">
              <H2>Others</H2>
            </div>
            
          </div>
          <div class="row">
          <?php
                  
                  $q=mysqli_query($conn, "SELECT * FROM products WHERE kategoriId=10" );
                  while($product=mysqli_fetch_assoc($q)){
                  
                ?>
          
            <div class="col-sm-4">
              <div class="thumbnail">
                <img src="<?php echo $product["filename"]  ?>" alt="...">
                <div class="caption">
                  <h3><?php echo $product["productName"]?></h3>
                  <div class="row">
                    <p class="spek col-sm-7 text-left"> <?php echo $product["productInfo"]?> <br> <?php echo $product["productInfo2"]?>
                    </p>
                    <p class="price col-sm-5 text-right">Rp. <?php echo $product["productPrice"]?></p>
                  </div>
                  <div class="row">
                  
                    
                    <!-- <a href="class="btn btn-default" >add to cart</a> -->
                    <button class="btn btn-primary add" data-id="<?php echo $product["id"]?>">add to cart</button>
                    <!-- <a class="btn btn-primary" id="tenda01" name = "tenda01"> Add to Cart 1</a> -->
                    <!-- <a href="#" class="btn btn-primary" type="submit" >Rent</a>  -->
                    <!-- <a href="confirm.php" class="btn btn-default" type="submit"  name="tenda01" >Rent</a> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  }
                  
                ?>
            </div>
        </section>
        <!-- akhir Sleeping-->  


      </div> 
    </div> 


  </div>                

<div class="view text-center col-md-2">
                <?php
                  
                  
                  $user=$_SESSION['username'];
                  $cart= mysqli_query($conn, "SELECT * FROM carts WHERE username ='$user'");
                  $cartData = mysqli_fetch_assoc($cart);
                  $cartId = $cartData["id"];
                  $q=mysqli_query($conn, "SELECT products.productName, products.productPrice, cartDetails.id, (COUNT(products.productName)) AS qty  FROM cartDetails INNER JOIN products ON cartDetails.item_Id=products.id WHERE cartId=$cartId 
                  GROUP by productName" );
                  // $product=mysqli_fetch_assoc($q);
                  $tot= mysqli_query($conn, "SELECT SUM(productPrice) as tot FROM cartDetails INNER JOIN products ON cartDetails.item_Id=products.id WHERE cartId=$cartId");
                  // $total=mysqli_fetch_assoc($tot);
                  

                  echo  "<table> ";
                  echo "<tr>";
                  echo "<th>Barang</th>";
                  echo "<th>Harga</th>";
                  echo "<th>Qty</th>";
                  echo "<th></th>";
                  echo "</tr>";
                  while($result=mysqli_fetch_assoc($q)){
                ?>
               
                  <tr>
                    <td><?php echo $result['productName'] ?></td>
                    <td><?php echo $result['productPrice'] ?></td>
                    <td><?php echo $result['qty'] ?></td>
                    <td> <button class="btn delete" data-id="<?php echo $result["id"]?>">X</button> </td>  
                  </tr>
                
                <?php
                }
                echo "</table>";
                while($total=mysqli_fetch_assoc($tot)){
                  
                ?>
                <p>total <?php echo $total['tot']?></p>

                <?php
                }
                ?>
                <a href="confirm.php" class="btn btn-primary" type="submit" >Rent</a>

                
</div>
<script>
$(document).ready(function() {
  $('.add').click(function() { 
            id = $(this).data('id');
              $.ajax({
                url:'/system/cart.php',
                method:'POST',
                dataType:'json',
                data:{
                      cartId : id,
                      action:'add',
                },
                success:function(data){
                  // // alert(data);
                  location.reload();
                }
              }).fail( function(xhr, textStatus, errorThrown) {
                // alert(xhr.responseText);
                location.reload();
    });
        
  })
  $('.delete').click(function() { 
            code = $(this).data('id');
              $.ajax({
                url:'/system/cart.php',
                method:'POST',
                dataType:'json',
                data:{
                      proId : code,
                      action :'delete',
                },
                success:function(data){
                  alert(data);
                  location.reload();
                }
              }).fail( function(xhr, textStatus, errorThrown) {
                // alert(xhr.responseText);
                location.reload();
    });
        
  })
})

</script>

</div>
</body>
</html>


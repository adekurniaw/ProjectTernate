<?php
include "../system/conn.php";
$conn= koneksi();
$username=strtolower(stripslashes($_POST["username"]));
function registration($data){
    global $conn;
    $name=$data["name"];
    global $username;
    $password=mysqli_real_escape_string($conn, $data["password"]);
    $password2=mysqli_real_escape_string($conn, $data["password2"]);

    // cek username
    $result = mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah ada, silahakn gunakan username lain')
        </script>";
        return false;
    }
    //cek pass pass2 
    if($password !== $password2){
        echo "<script>
            alert('Password Tidak sama')
        </script>";
        return false;
    }

    // enkripsi password
    $password=password_hash($password,PASSWORD_DEFAULT);
    
    //tmbahkan k db
    mysqli_query($conn, "INSERT INTO users VALUES( 0,'$name','$username','$password')");

    mysqli_query($conn,"INSERT INTO carts VALUES(0,'$username',0)");
    return mysqli_affected_rows($conn);
}
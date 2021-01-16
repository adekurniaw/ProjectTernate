<?php
session_start();
function session(){
  if (!isset($_SESSION["login"])) {
    # code...
    header("location:../view/signin.php");
    exit;
  }
}

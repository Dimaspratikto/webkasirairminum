<?php
session_start();

class proseskeranjang{
  function cekid(){
      $kd_barang = $_GET['id'];
      if(isset($_SESSION['cart'][$kd_barang])){
        $_SESSION['cart'][$kd_barang]+=1;
      }else{
        $_SESSION['cart'][$kd_barang]=1;
      }
  }
}
$obj = new proseskeranjang();
$obj->cekid();
echo "<script>location='viewTransaksi.php';</script>";
?>
                
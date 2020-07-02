<?php
session_start();
unset($_SESSION["cart"]);
echo "<script>location='viewTransaksi.php';</script>";
?>
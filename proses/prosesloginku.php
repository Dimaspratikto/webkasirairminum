<?php
session_start();
require "../model/modellogin.php";

class proseslogin{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objlogin = new modellogin();
        if($this->action=="loginadmin"){
            $useradmin=$_POST['usernameadmin'];
            $passadmin=$_POST['passwordadmin'];
            if($useradmin=="dimas"&&$passadmin=="pass"){
                header("location:../view/viewDatabarang.php");
            }else{
                echo "<script>alert('User / Id Salah');</script>";
                echo "<script>location='indexlog.php'</script>";
            }
        }
        elseif($this->action=="loginkasir"){
            $namakasir=$_POST["usernamekasir"];
            $passkasir=$_POST["passwordkasir"];
            $objlogin->cekkasir($namakasir,$passkasir);
            if($objlogin->getcekkasir()==1){
                $objlogin->akunkasir($namakasir,$passkasir);
                $akunkasir = $objlogin->getakunkasir();
                $_SESSION["kasir"]=$akunkasir;
                //echo '<pre>';
                //print_r($_SESSION["kasir"]);
                //echo '</pre>';
                echo "<script>alert('sukses');</script>";
                echo "<script>location='../view/formpelanggan.php'</script>";
            }else{
                echo "<script>alert('User / Id Salah');</script>";
                echo "<script>location='indexlog.php'</script>";
            }
        }
    }
}
$objproseslogin = new proseslogin($_GET['aksi']);
$objproseslogin->proses();
?>
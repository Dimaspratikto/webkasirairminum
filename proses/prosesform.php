<?php
session_start();

class prosesform{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        if ($this->action=="act"){
            $nama=$_POST["namapelanggan"];
           
            echo $nama;
        
            $sqltext = "SELECT COUNT(*) FROM PELANGGAN_06958 WHERE NAMA_PELANGGAN_06958='$nama'";
            $statement = oci_parse(oci_connect("dimasp_06958","dimas","localhost/XE"),$sqltext);
            oci_execute($statement);
            $key=oci_fetch_array($statement,OCI_BOTH);
            $hitung = $key["COUNT(*)"];
            if($hitung==1){
                $query = "SELECT * FROM PELANGGAN_06958 WHERE NAMA_PELANGGAN_06958='$nama'";
                $statemen = oci_parse(oci_connect("dimasp_06958","dimas","localhost/XE"),$query);
                oci_execute($statemen);
                $akun = oci_fetch_array($statemen,OCI_BOTH);
                echo $akun['NAMA_PELANGGAN_06958'];
                $_SESSION["pelanggan"]=$akun;
                echo "<script>alert('sukses');</script>";
                echo "<script>location='../view/viewTransaksi.php'</script>";
                
            }else{
                echo "<script>alert('Nama Tidak Ditemukan');</script>";
                echo "<script>location='../view/formpelanggan.php'</script>";
            }
            
        }    
    }
}
$objform = new prosesform($_GET['aksi']);
$objform->proses();
?>
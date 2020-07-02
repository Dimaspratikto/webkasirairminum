<?php
session_start();
require "../model/modelDTransaksi.php";

class prosesbarang{
    private $action;

    function __construct($act){
        $this->action=$act;
    } 
    function proses(){
        $objmodelpesan = new modelTransaksi();
        if($this->action=="act"){
            $idtransak = $_POST["idtransaksi"];
            $idkasir = $_SESSION["kasir"]["ID_KASIR"];
            $idpelanggan = $_SESSION["pelanggan"]["ID_PELANGGAN"];
            $tanggalan = $_POST["tanggal"];
            $totalbelanja = $_POST["totalbelanja"];
            $objmodelpesan->inserttr($idtransak,$idkasir,$idpelanggan,$tanggalan,$totalbelanja);
            foreach ($_SESSION["cart"] as $kd_barang => $jumlah) {
                $sqltext = "SELECT * FROM BARANG_06958 WHERE KD_BARANG = '$kd_barang'";
                    $statement = oci_parse(oci_connect("dimasp_06958","dimas","localhost/XE"),$sqltext);
                    oci_execute($statement);
                    $key=oci_fetch_array($statement,OCI_BOTH);
                    //$objmodelpesan->setsubtotal($objmodelpesan->viewhgbarang(),$jumlah);
                    $subtotal = $key['HARGA']*$jumlah;
                    $objmodelpesan->insertdetail($kd_barang,$idtransak,$jumlah,$subtotal);
            }    
            unset($_SESSION["pelanggan"]);
            unset($_SESSION["cart"]);
            header("location:../view/viewDatatransaksi.php");
        }
    }
}
$objprosesbarang = new prosesbarang($_GET['aksi']);
$objprosesbarang->proses();

?>
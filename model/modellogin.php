<?php
require 'koneksiDB.php';
class modellogin extends koneksiDB{
    private $cekkasir;
    private $akunkasir;
    
    function cekkasir($nama,$pass){
        $sqltext = "SELECT COUNT(*) FROM KASIR_06958 WHERE NAMA_KASIR='$nama' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->cekkasir = $key["COUNT(*)"];
        oci_free_statement($statement);
    }
    function getcekkasir(){
        return $this->cekkasir;
    }
    function akunkasir($nama,$pass){
        $sqltext = "SELECT * FROM KASIR_06958 WHERE NAMA_KASIR='$nama' AND PASSWORD='$pass'";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        $key=oci_fetch_array($statement,OCI_BOTH);
        $this->akunkasir=$key;
    }
    function getakunkasir(){
        return $this->akunkasir;
    }

}

?>
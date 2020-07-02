		<?php 
require 'koneksiDB.php';

class modelTransaksi extends koneksiDB
{
	private $dataTransaksi;
	private $listpemesanan;
	private $barangpesanan;
	private $barangku;
	private $namabarangku;
    private $hargabarangku;
    private $kurirku;
    private $namakurir;
    private $setsubtotal;
    private $getsubtotal;
    private $kode=0;
    private $idbaru;
    private $kembali;

	function select()
	{
		$sqltext="SELECT A.ID_TRANSAKSI, B.NAMA_KASIR, C.NAMA_KURIR, D.NAMA_PELANGGAN_06958, A.TOTAL,A.BAYAR,A.KEMBALI
		FROM TRANSAKSI_06958 A JOIN KASIR_06958 B ON A.ID_KASIR = B.ID_KASIR 
		JOIN KURIR_06958 C ON A.ID_KURIR = C.ID_KURIR
		JOIN PELANGGAN_06958 D ON A.ID_PELANGGAN = D.ID_PELANGGAN";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataTransaksi = $temp;

		oci_free_statement($statement);

	}
	function selectlist(){
        $sqltext = "SELECT * FROM TRANSAKSI_06958";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);

        //variabel data barang diisi dari DB
        $temp;
        while($row=oci_fetch_array($statement,OCI_BOTH)){
            $temp[] = $row;
        }
        $this->listpemesanan=$temp;
    }
     function getDatalist(){
        return $this->listpemesanan;
    }
    
	function setidbaru(){
        return $this->idbaru="tran".sprintf($this->kode+1);
    }
    function getidbaru(){
        return $this->idbaru;
    }
    //INSERT TRANSAKSI_06958
     function inserttr($idtransaksi,$idkasir,$idpelanggan,$tanggal,$total){
        $sqltext = "INSERT INTO TRANSAKSI_06958 (ID_TRANSAKSI,ID_KASIR,ID_PELANGGAN,TANGGAL,TOTAL)
        VALUES ('$idtransaksi','$idkasir','$idpelanggan',TO_DATE('$tanggal','DD/MM/YYYY'),'$total')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
    //INSERT DETAIL TRANSAKSI
    function insertdetail($qty,$subtotal,$idtransaksi,$kd_barang){
        $sqltext = "INSERT INTO DETAIL_TRANSAKSI_06958 VALUES ('$qty','$subtotal','$idtransaksi','$id_barang')";
        $statement = oci_parse($this->koneksi,$sqltext);
        oci_execute($statement);
        oci_free_statement($statement);
    }
	function insert($KDBARANG,$NAMABARANG,$STOKK,$HARGAA)
	{
		$sqltext="INSERT INTO BARANG_06958 VALUES ('$KDBARANG','$NAMABARANG','$STOKK','$HARGAA')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
		
	}
	function getData()
	{
		return $this->dataTransaksi;
	}
	function delete($KDBARANG)
	{
		$sqltext="DELETE FROM BARANG_06958 WHERE KD_BARANG='$KDBARANG'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
	function update($KDBARANG,$NAMABARANG,$STOKK,$HARGAA)
	{
		$sqltext="UPDATE BARANG_06958 SET NAMA_BARANG='$NAMABARANG',STOK='$STOKK',HARGA='$HARGAA' WHERE KD_BARANG = '$KDBARANG'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}

	//barang
	function selectidb(){
        $sqltext="SELECT * FROM BARANG_06958";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->barangku = $temp;

		oci_free_statement($statement);
    }
    function getnamabarang(){
        return $this->barangku;
    }
    function viewnamabarang(){
    	foreach ($this->barangku as $key){
    		echo $key['NAMA_BARANG'];
    		echo "<br>";
    	}
    }

  
    //kurir
    function selectidk(){
             $sqltext="SELECT * FROM KURIR_06958";
			 $statement=oci_parse($this->koneksi,$sqltext);
			 oci_execute($statement);
            
            //mengisi variable databarang dari database
			while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->kurirku = $temp;

		oci_free_statement($statement);
    }
    function getnamakurir(){
        return $this->kurirku;
    }
    function viewnamakurir(){
    	foreach ($this->kurirku as $key){
    		echo $key['NAMA_KURIR'];
    		echo "<br>";
    	}
    }
    //pesanan
    function selectid($kd_barang){
            $sqltext = "SELECT * FROM BARANG_06958 WHERE KD_BARANG = '$kd_barang'";
            $statement = oci_parse($this->koneksi,$sqltext);
            oci_execute($statement);
            $this->barangpesanan=$key=oci_fetch_array($statement,OCI_BOTH);
    }
    function viewnmbarang(){
        return $this->namabarangku = $this->barangpesanan["NAMA_BARANG"];
    }
    function viewhgbarang(){
        return $this->hargabarangku=$this->barangpesanan["HARGA"];
    }
    function setsubtotal($harga,$jumlah){
        $this->subtotal=$harga*$jumlah;
    }
    function getsubtotal(){
        return $this->subtotal;
    }
    function hitungkembalian($bayar,$total_keseluruhan){
        $this->kembali = $bayar-$total_keseluruhan;
    }
    function getkembalian(){
        return $this->kembali;
    }
	function viewData()
	{
		foreach ($this->dataTransaksi as $key) {
			echo $key['ID_TRANSAKSI'];
			echo " -> ";
			echo $key['NAMA_KASIR'];
			echo " -> ";
			echo $key['NAMA_KURIR'];
			echo " -> ";
			echo $key['NAMA_PELANGGAN_06958'];
			echo " -> ";
			echo $key['TOTAL'];
			echo " -> ";
			echo $key['BAYAR'];
			echo " -> ";
			echo $key['KEMBALI'];
			echo "<br>";

			
		}
	}
}
$objModelTransaksi=new modelTransaksi();
//$objModelBarang->insert('5','CLEO250ML','25','20000');
//$objModelBarang->delete(5);
//$objModelTransaksi->update('4','CLUB19L','50','24000');
$objModelTransaksi->selectidk();
//$objModelTransaksi->getnamakurir();
//$objModelTransaksi->viewnamakurir();
//$objModelTransaksi->viewData();

?>
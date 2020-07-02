		<?php 
require 'koneksiDB.php';

class modelPelanggan extends koneksiDB
{
	private $dataPelanggan;

	function select()
	{
		$sqltext="SELECT * FROM PELANGGAN_06958";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataPelanggan = $temp;

		oci_free_statement($statement);

	}
	function insert($NAMA_PELANGGAN_06958,$ALAMAT,$TELP)
	{
		//$sqltext='select max(ID_PELANGGAN) from PELANGGAN_06958';
		//$statement=oci_parse($this->koneksi, $sqltext);
		//oci_execute($statement);
		//while ($row=oci_fetch_array($statement,OCI_BOTH))
		//{
		//	$ID_PELANGGAN=$row['MAX(ID_PELANGGAN'];
		//}
		//oci_free_statement($statement);
		$sqltext="INSERT INTO PELANGGAN_06958 VALUES (ID_PELANGGAN.NEXTVAL,'$NAMA_PELANGGAN_06958','$ALAMAT','$TELP')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
		
	}
	function getData()
	{
		return $this->dataPelanggan;
	}
	function delete($IDPELANGGAN)
	{
		$sqltext="DELETE FROM PELANGGAN_06958 WHERE ID_PELANGGAN='$IDPELANGGAN'";
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
	function viewData()
	{
		foreach ($this->dataPelanggan as $key) {
			echo $key['ID_PELANGGAN'];
			echo " -> ";
			echo $key['NAMA_PELANGGAN_06958'];
			echo " -> ";
			echo $key['ALAMAT'];
			echo " -> ";
			echo $key['TELP'];
			echo "<br>";

			
		}
	}
}
$objModelPelanggan=new modelPelanggan();
//$objModelPelanggan->insert('CLEO250ML','blk','08192');
//$objModelPelanggan->delete(125);
//$objModelBarang->update('4','CLUB19L','50','24000');
$objModelPelanggan->select();
//$objModelPelanggan->viewData();


?>
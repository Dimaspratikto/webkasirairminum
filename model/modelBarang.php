		<?php 
require 'koneksiDB.php';

class modelBarang extends koneksiDB
{
	private $dataBarang;

	function select()
	{
		$sqltext="SELECT * FROM BARANG_06958";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataBarang = $temp;

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
		return $this->dataBarang;
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
	function viewData()
	{
		foreach ($this->dataBarang as $key) {
			echo $key['KD_BARANG'];
			echo " -> ";
			echo $key['NAMA_BARANG'];
			echo " -> ";
			echo $key['STOK'];
			echo " -> ";
			echo $key['HARGA'];
			echo "<br>";

			
		}
	}
}
$objModelBarang=new modelBarang();
//$objModelBarang->insert('5','CLEO250ML','25','20000');
//$objModelBarang->delete(5);
//$objModelBarang->update('4','CLUB19L','50','24000');
$objModelBarang->select();
//$objModelBarang->viewData();

?>
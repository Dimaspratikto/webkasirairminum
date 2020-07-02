<?php 
require 'koneksiDB.php';

class modelKasir extends koneksiDB
{
	private $dataKasir;

	function select()
	{
		$sqltext="SELECT * FROM KASIR_06958";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataKasir = $temp;

		oci_free_statement($statement);

	}
	function insert($IDKASIR,$USERNAME,$PASSWORD,$NAMAKASIR,$ALAMAT,$TELP,$JK)
	{
		$sqltext="INSERT INTO KASIR_06958 VALUES ('$IDKASIR','$USERNAME','$PASSWORD','$NAMAKASIR','$ALAMAT','$TELP','$JK')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
		
	}
	function getData()
	{
		return $this->dataKasir;
	}
	function delete($IDKASIR)
	{
		$sqltext="DELETE FROM KASIR_06958 WHERE ID_KASIR='$IDKASIR'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
	function update($IDKASIR,$USERNAME,$PASSWORD,$NAMAKASIR,$ALAMAT,$TELP,$JK)
	{
		$sqltext="UPDATE KASIR_06958 SET USERNAME='$USERNAME',PASSWORD='$PASSWORD',NAMA_KASIR='$NAMAKASIR', ALAMAT='$ALAMAT', TELP='$TELP', JENIS_KELAMIN='$JK' WHERE ID_KASIR = '$IDKASIR'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
	function viewData()
	{
		foreach ($this->dataKasir as $key) {
			echo $key['ID_KASIR'];
			echo " -> ";
			echo $key['USERNAME'];
			echo " -> ";
			echo $key['PASSWORD'];
			echo " -> ";
			echo $key['NAMA_KASIR'];
			echo " -> ";
			echo $key['ALAMAT'];
			echo " -> ";
			echo $key['TELP'];
			echo " -> ";
			echo $key['JENIS_KELAMIN'];
	
			echo "<br>";

			
		}
	}
}
$objModelKasir=new modelKasir();
//$objModelKasir->insert('10','New1','12345','new1','new1','123','L');
//$objModelKasir->delete(1);
//$objModelKasir->update('4','CLUB19L','50','24000');
$objModelKasir->select();
//$objModelKasir->viewData();

?>
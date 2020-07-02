<?php 
require 'koneksiDB.php';

class modelKurir extends koneksiDB
{
	private $dataKurir;

	function select()
	{
		$sqltext="SELECT * FROM KURIR_06958";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		//mengisi variable databarang dari database
		while ($row=oci_fetch_array($statement,OCI_BOTH))
		{
			$temp[] = $row;
		}
		$this->dataKurir = $temp;

		oci_free_statement($statement);

	}
	function insert($IDKURIR,$NAMAKURIR,$ALAMAT,$TELP)
	{
		$sqltext="INSERT INTO KURIR_06958 VALUES ('$IDKURIR','$NAMAKURIR','$ALAMAT','$TELP')";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);

		oci_free_statement($statement);
		
	}
	function getData()
	{
		return $this->dataKurir;
	}
	function delete($IDKURIR)
	{
		$sqltext="DELETE FROM KURIR_06958 WHERE ID_KURIR='$IDKURIR'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
	function update($IDKURIR,$NAMAKURIR,$ALAMAT,$TELP)
	{
		$sqltext="UPDATE KURIR_06958 SET NAMA_KURIR='$NAMAKURIR',ALAMAT='$ALAMAT',TELP='$TELP' WHERE ID_KURIR = '$IDKURIR'";
		$statement=oci_parse($this->koneksi,$sqltext);
		oci_execute($statement);
		oci_free_statement($statement);
	}
	function viewData()
	{
		foreach ($this->dataKurir as $key) {
			echo $key['ID_KURIR'];
			echo " -> ";
			echo $key['NAMA_KURIR'];
			echo " -> ";
			echo $key['ALAMAT'];
			echo " -> ";
			echo $key['TELP'];
			echo "<br>";

			
		}
	}
}
$objModelKurir=new modelKurir();
//$objModelKurir->insert('8','anto','kedinding','089');
//$objModelKurir->delete(6);
//$objModelKurir->update('4','CLUB19L','bulak');
$objModelKurir->select();
//$objModelKurir->viewData();

?>
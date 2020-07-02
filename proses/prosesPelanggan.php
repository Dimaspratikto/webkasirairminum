<?php
require '../model/modelPelanggan.php';
class prosesPelanggan
{
	private $action;
	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel= new modelPelanggan();

		if($this->action=="tambah")
		{
			//$kdbarang=$_POST['inputkode'];
			$nmpel=$_POST['inputnama'];
			$alamatpel=$_POST['inputalamat'];
			$telppel=$_POST['inputtelp'];
			$objmodel->insert($nmpel,$alamatpel,$telppel);
			header("location:../view/viewDatapelanggan.php");
		}
		elseif ($this->action=="hapus") 
		{
			$idpelanggan=$_GET['idpelanggan'];
		
			$objmodel->delete($idpelanggan);
			header("location:../view/viewDatapelanggan.php");
		}
		elseif ($this->action=="edit") 
		{
			echo " test masuk";
			
			$namaPel=$_POST['namapel'];
			$almtPel=$_POST['almtpel'];
			$telpPel=$_POST['telppel'];
			$objmodel->update($namaPel,$almtPel,$telpPel);
			header("location:../view/viewDatapelanggan.php");
			

		}

	}
}
$objprosesPelanggan=new prosesPelanggan($_GET['aksi']);
$objprosesPelanggan->proses();
?>
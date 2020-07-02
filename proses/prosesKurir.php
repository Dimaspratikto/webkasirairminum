<?php
require '../model/modelKurir.php';
class prosesKurir
{
	private $action;
	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel= new modelKurir();

		if($this->action=="tambah")
		{
			$idkurire=$_POST['inputId'];
			$namakurire=$_POST['inputNama'];
			$alamatkurire=$_POST['inputAlamat'];
			$telpkurire=$_POST['inputTelp'];
			$objmodel->insert($idkurire,$namakurire,$alamatkurire,$telpkurire);
			header("location:../view/viewKurir.php");
		}
		elseif ($this->action=="hapus") 
		{
			$kdkurir=$_GET['kdkurir'];
		
			$objmodel->delete($kdkurir);
			header("location:../view/viewKurir.php");
		}
		elseif ($this->action=="edit") 
		{
			echo " test masuk";
			$kdkurer=$_POST['kdkurer'];
			$nmkurer=$_POST['nmkurer'];
			$almtkurer=$_POST['almtkurer'];
			$telpkurer=$_POST['tlpkurer'];
		
			$objmodel->update($kdkurer,$nmkurer,$almtkurer,$telpkurer);
				header("location:../view/viewKurir.php");
			

		}

	}
}
$objprosesKurir=new prosesKurir($_GET['aksi']);
$objprosesKurir->proses();
?>
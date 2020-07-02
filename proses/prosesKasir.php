<?php
require '../model/modelKasir.php';
class prosesKasir
{
	private $action;
	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel= new modelKasir();

		if($this->action=="tambah")
		{
			$idkaser=$_POST['inputidkaser'];
			$userkaser=$_POST['inputusername'];
			$passkaser=$_POST['inputpassword'];
			$namakaser=$_POST['inputnamakasir'];
			$almtkaser=$_POST['inputalamatkasir'];
			$telpkaser=$_POST['inputtelpkasir'];
			$jenisklkaser=$_POST['inputjkkasir'];
	
			
			
			$objmodel->insert($idkaser,$userkaser,$passkaser,$namakaser,$almtkaser,$telpkaser,$jenisklkaser);
			header("location:../view/viewKasir.php");
		}
		elseif ($this->action=="hapus") 
		{
			$kdkaser=$_GET['kdkasir'];
		
			$objmodel->delete($kdkaser);
			header("location:../view/viewKasir.php");
		}
		elseif ($this->action=="edit") 
		{
			echo " test masuk";
			$kdkasir=$_POST['kdkasir'];
			$uskasir=$_POST['uskasir'];
			$paskasir=$_POST['paskasir'];
			$nmkasir=$_POST['nmkasir'];
			$almtkasir=$_POST['almtkasir'];
			$tlpkasir=$_POST['tlpkasir'];
			$jkkasir=$_POST['jkkasir'];
			$objmodel->update($kdkasir,$uskasir,$paskasir,$nmkasir,$almtkasir,$tlpkasir,$jkkasir);
			header("location:../view/viewKasir.php");
			
			

		}

	}
}
$objprosesKasir=new prosesKasir($_GET['aksi']);
$objprosesKasir->proses();
?>
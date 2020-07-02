<?php
require '../model/modelBarang.php';
class prosesBarang
{
	private $action;
	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel= new modelBarang();

		if($this->action=="tambah")
		{
			$kdbarang=$_POST['inputkode'];
			$nmbarang=$_POST['inputnama'];
			$stokbarang=$_POST['inputstok'];
			$hargabarang=$_POST['inputharga'];
			$objmodel->insert($kdbarang,$nmbarang,$stokbarang,$hargabarang);
			header("location:../view/viewDatabarang.php");
		}
		elseif ($this->action=="hapus") 
		{
			$idbarang=$_GET['idbarang'];
		
			$objmodel->delete($idbarang);
			header("location:../view/viewDatabarang.php");
		}
		elseif ($this->action=="edit") 
		{
			echo " test masuk";
			$kdBarang=$_POST['kodebarang'];
			$nmBarang=$_POST['namabarang'];
			$stkBarang=$_POST['stkbarang'];
			$hrgBarang=$_POST['hrgbarang'];
			$objmodel->update($kdBarang,$nmBarang,$stkBarang,$hrgBarang);
			header("location:../view/viewDatabarang.php");
			

		}

	}
}
$objprosesBarang=new prosesBarang($_GET['aksi']);
$objprosesBarang->proses();
?>
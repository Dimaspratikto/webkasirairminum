<?php
require '../model/modelDTransaksi.php';
class prosesTransaksi
{
	private $action;
	function __construct($act)
	{
		$this->action=$act;
	}

	function proses()
	{
		$objmodel= new modelTransaksi();

		if($this->action=="hapus")
		{
			$idtransaksi=$_GET['idtransaksi'];
		
			$objmodel->deletee($idtransaksi);
			header("location:../view/viewDatatransaksi.php");
		}
		elseif ($this->action=="hapuss") 
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
$objprosesBarang=new prosesTransaksi($_GET['aksi']);
$objprosesBarang->proses();
?>
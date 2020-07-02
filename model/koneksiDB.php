<?php 
class koneksiDB
{
	private $uname='dimasp_06958';
	private $pass='dimas';
	private $host='localhost/XE';
	protected $koneksi;

	function __construct()
	{
		$konek=oci_connect($this->uname, $this->pass, $this->host);
		if($konek)
		{
			//echo "berhasil konek";
			$this->koneksi=$konek;
		}
		else
		{
			echo "gagal";
		}
	}
}
$objekKoneksi=new koneksiDB();
?>
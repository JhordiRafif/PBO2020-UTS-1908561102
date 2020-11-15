<?php
include('../class.crud.php');

$crud = new Crud();

if(isset($_GET['id'])) 
{
	$id = $_GET['id'];

	$hasil = $crud->delete('tbl_mahasiswa','nim',$id);
	if($hasil)
	{
		header('Location: data_mahasiswa.php');
	}
	else
	{
		echo "Gagal Hapus";
	}
}
?>
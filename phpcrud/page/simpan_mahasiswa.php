<?php
include('../class.crud.php');

$crud = new Crud();
if($_POST['action'] == 'simpan') {
	$arrData = array('nim'=>$_POST['nim'],
					'nama'=>$_POST['nama'],
					'alamat'=>$_POST['alamat'],
					'no_hp'=>$_POST['hp']);

	$hasil = $crud->simpan('tbl_mahasiswa',$arrData);
}
else
{
	$arrData = array("nama='".$_POST['nama']."'",
					"alamat='".$_POST['alamat']."'",
					"no_hp='".$_POST['hp']."'");
	$idvalue = $_POST['nim'];
	$hasil = $crud->update('tbl_mahasiswa',$arrData,'nim',$idvalue);
}

if($hasil)
{
	header('Location: data_mahasiswa.php');
}
else
{
	echo "Gagal Simpan";
}
?>
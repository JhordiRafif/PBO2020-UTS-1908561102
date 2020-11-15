<?php
		include('../class.crud.php');
		$crud = new Crud;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Kampus</title>
</head>
<body>
<?php 
	if(isset($_GET['id'])) 
	{
		$id = $_GET['id'];

		$update = $crud->read_data('tbl_mahasiswa','nim',$id);
		foreach ($update as $upd) {
			$nim = $upd['nim'];
			$nama = $upd['nama'];
			$alamat = $upd['alamat'];
			$hp = $upd['no_hp'];
			$readonly = 'readonly';
			$action = 'update';
		}
	}
	else
	{
		$nim = '';
		$nama = '';
		$alamat = '';
		$hp = '';
		$readonly = '';
		$action = 'simpan';
	}
?>
<form action="simpan_mahasiswa.php" method="post">
<table>
	<tr>
		<td>NIM</td>
		<td>:</td>
		<td><input type="number" name="nim" value="<?php echo $nim; ?>" <?php echo $readonly; ?>></td>
	</tr>
	<tr>
		<td>NAMA</td>
		<td>:</td>
		<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
	</tr>
	<tr>
		<td>ALAMAT</td>
		<td>:</td>
		<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
	</tr>
	<tr>
		<td>HANDPHONE</td>
		<td>:</td>
		<td><input type="number" name="hp" value="<?php echo $hp; ?>"></td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td>
			<input type="submit" name="simpan" value="Simpan">
			<input type="reset" value="Reset">
			<input type="hidden" name="action" value="<?php echo $action; ?>">
		</td>
	</tr>
</table>
</form>
<table>
	<tr>
		<th>NO</th>
		<th>NIM</th>
		<th>NAMA</th>
		<th>ALAMAT</th>
		<th>NO HP</th>
		<th>AKSI</th>
	</tr>
	<?php
		
		$mahasiswa = $crud->read_data('tbl_mahasiswa',null,null);
		$no = 1;

		foreach ($mahasiswa as $mhs) {
		?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $mhs['nim']; ?></td>
				<td><?php echo $mhs['nama']; ?></td>
				<td><?php echo $mhs['alamat']; ?></td>
				<td><?php echo $mhs['no_hp']; ?></td>
				<td>
					<a href="data_mahasiswa.php?id=<?php echo $mhs['nim']; ?>">Edit</a> | 
					<a href="hapus_mahasiswa.php?id=<?php echo $mhs['nim']; ?>">Hapus</a>
				</td>
			</tr>
		<?php } ?>
	
</table>
</body>
</html>
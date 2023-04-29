<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Data Pegawai</h2>
<a href="create_data.php">Tambah Data</a>
<table border="1" style="border-collapse:collapse">
	<tr bgcolor="#eee">
		<th width="50">No</th>
		<th width="100">No Pegawai</th>
		<th width="150">Nama</th>
		<th width="120">Divisi</th>
		<th width="100">Gaji Pokok</th>
		<th width="100">Tunjangan</th>
		<th width="100">Lembur</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php 
	include "koneksi.php";

	$no=1;
	$ambildata = mysqli_query($conn, "SELECT * FROM pegawai, divisi 
		WHERE pegawai.id_divisi = divisi.id_divisi") or die(mysqli_error($conn));	

	while ($tampil = mysqli_fetch_array($ambildata)) {
 		echo "
 		<tr>
 			<td align='center'>$no</td>
 			<td align='center'>$tampil[no_pegawai]</td>
 			<td align='center'>$tampil[nama]</td>
 			<td align='center'>$tampil[divisi]</td>
 			<td align='center'>$tampil[gaji_pokok]</td>
 			<td align='center'>$tampil[tunjangan]</td>
 			<td align='center'>$tampil[lembur]</td>
 			<td> 
 				<a href='update_data.php?update=$tampil[id_pegawai]'>
 				<input type='button' value='Edit'>
 				</a>
 			 </td>
 			 <td>
 			 	<a href='?hapus=$tampil[id_pegawai]' onClik=\"return confirm('Ingin Menghapus Data?');\">
 			 	<input type='button' value='Hapus'>
 			 	</a>
 			 </td>
 		</tr>";
 		$no++;
 	}
	 ?>
</table>
</body>

	<?php 
	if (isset($_GET['hapus'])) {
	mysqli_query($conn, "delete from pegawai WHERE id_pegawai='$_GET[hapus]'")
	or die(mysqli_error($conn));
	echo "<p><b> Data berhasil dihapus....</b></p>";
	echo "<meta http-equiv=refresh content=1;URL='data_pegawai.php'>";
	}
	 ?>
</html>
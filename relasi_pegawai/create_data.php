<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2>Tambah Data Pegawai</h2>
<form action="" method="post">
	<table >
		<tr>
			<td width="100">No Pegawai</td>
			<td><input type="text" name="no_pegawai"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" size="30"></td>
		</tr>
		<tr>
			<td>Divisi</td>
			<td><select name="id_divisi">
				<option>----</option>
				<?php 
					include "koneksi.php";
					$query = mysqli_query($conn, "SELECT * FROM divisi") or die(mysqli_error($conn));
					while ($data = mysqli_fetch_array($query)) {
						echo "<option value=$data[id_divisi]> $data[divisi]</option>";
					}				 ?>
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="simpan" name="proses"></td>
		</tr>
	</table>
</form>
</body>

<?php 
	if (isset($_POST['proses'])) {
		mysqli_query($conn,"insert into pegawai set 
			no_pegawai = '$_POST[no_pegawai]',
			nama = '$_POST[nama]',
			id_divisi = '$_POST[id_divisi]'") or die(mysqli_error($conn));
		echo "<script>alert('Data telah tersimpan')</script>";
	}
 ?>
</html>
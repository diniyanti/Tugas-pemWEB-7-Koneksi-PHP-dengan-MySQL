<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <h2>Update Data Pegawai</h2>

 <?php 
  include "koneksi.php";
  $sql=mysqli_query($conn, "SELECT * FROM pegawai, divisi where 
  	pegawai.id_divisi=divisi.id_divisi and id_pegawai='$_GET[update]'");
  $data=mysqli_fetch_array($sql);
  ?>

  <form action="" method="post">
  <table>
  	<tr>
  		<td width="100">No Pegawai</td>
  		<td><input type="text" name="no_pegawai" value="<?php echo $data['no_pegawai']; ?>"></td>
  	</tr>
  	<tr>
  		<td width="100">Nama</td>
  		<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
  	</tr>
  	<tr>
  		<td width="100">Divisi</td>
  		<td><select name="id_divisi">
  			<?php 
  				echo "<option value=$data[id_divisi]>$data[divisi]</option>";
  				$query = mysqli_query($conn, "SELECT *FROM divisi") or die(mysqli_error($conn));
  				while ($data = mysqli_fetch_array($query)) {
  					echo "<option value=$data[id_divisi]> $data[divisi]</option>";
  				}
  			 ?>
  		</select></td>
  	</tr>
  	<tr>
  		<td></td>
  		<td><input type="submit" value="Simpan" name="proses"></td>
  	</tr>
  </table>
  </form>
</body>

<?php 
if (isset($_POST['proses'])) {
	mysqli_query($conn, "update pegawai set 
		no_pegawai = '$_POST[no_pegawai]',
		nama = '$_POST[nama]',
		id_divisi = '$_POST[id_divisi]' where id_pegawai =$_GET[update]") or die(mysqli_error($conn)) ;

	echo "<script>alert('Data telah diubah');
	document.location='data_pegawai.php'</script>";
}
 ?>
</html>
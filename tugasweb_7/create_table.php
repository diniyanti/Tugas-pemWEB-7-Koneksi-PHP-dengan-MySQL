<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_bukutamu";
// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// membuat tabel
$sql = "CREATE TABLE bukutamu (
ID_BT INT(10) AUTO_INCREMENT PRIMARY KEY,
NAMA VARCHAR(200) NOT NULL,
EMAIL VARCHAR(50) NOT NULL,
ISI TEXT NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Tabel bukutamu berhasil dibuat";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
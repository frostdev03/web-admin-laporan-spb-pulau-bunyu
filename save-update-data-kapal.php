<?php
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "laporan-spb-pulau-bunyu";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

$no = isset($_POST['no']) ? $_POST['no'] : '';
$nama_kapal = isset($_POST['nama_kapal']) ? $_POST['nama_kapal'] : '';
$gt = isset($_POST['gt']) ? $_POST['gt'] : '';
$bendera = isset($_POST['bendera']) ? $_POST['bendera'] : '';

if ($no) {
    // Update data jika No ada
    $query = "UPDATE `data-kapal` SET `NAMA KAPAL` = ?, GT = ?, BENDERA = ? WHERE NO = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssss', $nama_kapal, $gt, $bendera, $no);
} else {
    // Insert data baru jika No tidak ada
    $query = "INSERT INTO `data-kapal` (`NAMA KAPAL`, GT, BENDERA) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('sss', $nama_kapal, $gt, $bendera);
}

if ($stmt->execute()) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();

// Redirect kembali ke halaman utama setelah penyimpanan
header("Location: index.php");
exit;
?>

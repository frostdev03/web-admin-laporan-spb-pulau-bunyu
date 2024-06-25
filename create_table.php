<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database kamu
$password = ""; // Sesuaikan dengan password database kamu
$dbname = "nama_database"; // Ganti dengan nama database yang akan kamu gunakan

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// SQL untuk membuat tabel
$sql = "CREATE TABLE kedatangan_kepergian_kapal (
    nomor INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hari TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    no_cetak_spb VARCHAR(50) NOT NULL,
    nama_kapal VARCHAR(50) NOT NULL,
    call_sign VARCHAR(50) NOT NULL,
    gross_tonnage INT(10) NOT NULL,
    bendera VARCHAR(50) NOT NULL,
    tanggal_tiba DATE NOT NULL,
    pelabuhan_asal VARCHAR(50) NOT NULL,
    no_spb_tiba VARCHAR(50) NOT NULL,
    tanggal_tolak DATE NOT NULL,
    pelabuhan_tujuan VARCHAR(50) NOT NULL,
    no_spb_tolak VARCHAR(50) NOT NULL,
    eta DATE NOT NULL,
    tiba_dewasa INT(10) NOT NULL,
    tiba_anak INT(10) NOT NULL,
    tolak_dewasa INT(10) NOT NULL,
    tolak_anak INT(10) NOT NULL,
)";

// Menjalankan query untuk membuat tabel
if ($conn->query($sql) === TRUE) {
    echo "Tabel 'kedatangan_kepergian_kapal' berhasil dibuat";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

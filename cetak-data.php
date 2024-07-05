<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laporan-spb-pulau-bunyu";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari tabel
$sql = "SELECT * FROM spb"; // Sesuaikan nama tabel Anda
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Membuat file CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=jadwal_kapal.csv');

    $output = fopen('php://output', 'w');

    // Mengambil data HARI dari baris pertama
    $firstRow = $result->fetch_assoc();
    $hari = $firstRow['HARI'];
    
    // Menulis data HARI di atas header
    fputcsv($output, array("HARI: " . $hari));
    fputcsv($output, array()); // Menambah baris kosong antara HARI dan header

    // Menulis header
    fputcsv($output, array('NO', 'NO CETAK SPB', 'NAMA KAPAL', 'GT', 'BENDERA', 'NAMA PANGGIL', 'TANGGAL TIBA', 'PELABUHAN ASAL', 'NO SPB TIBA', 'TANGGAL TOLAK', 'PELABUHAN TUJUAN', 'NO SPB TOLAK', 'ETA', 'TIBA DEWASA', 'TIBA ANAK', 'TOLAK DEWASA', 'TOLAK ANAK')); // Sesuaikan header CSV Anda

    // Mengembalikan pointer ke baris pertama
    $result->data_seek(0);

    // Menulis data baris
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, array($no, $row['NO CETAK SPB'], $row['NAMA KAPAL'], $row['GT'], $row['BENDERA'], $row['NAMA PANGGIL'], $row['TANGGAL TIBA'], $row['PELABUHAN ASAL'], $row['NO SPB TIBA'], $row['TANGGAL TOLAK'], $row['PELABUHAN TUJUAN'], $row['NO SPB TOLAK'], $row['ETA'], $row['TIBA DEWASA'], $row['TIBA ANAK'], $row['TOLAK DEWASA'], $row['TOLAK ANAK'])); // Sesuaikan kolom data Anda
        $no++;
    }
    fclose($output);
} else {
    echo "Tidak ada data ditemukan.";
}

$conn->close();
?>

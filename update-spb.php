<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $noCetakSPB = $_POST['noCetakSPB'];
    $namaKapal = $_POST['namaKapal'];
    $namaPanggilan = $_POST['namaPanggilan'];
    $tanggalTiba = $_POST['tanggaltiba'];
    $pelabuhanAsal = $_POST['pelabuhanAsal'];
    $nomorSPBtiba = $_POST['nomorSPBtiba'];
    $tanggalTolak = $_POST['tanggaltolak'];
    $pelabuhanTujuan = $_POST['pelabuhanTujuan'];
    $nomorSPBtolak = $_POST['nomorSPBtolak'];
    $eta = $_POST['eta'];
    $tibaDewasa = $_POST['tibaDewasa'];
    $tibaAnak = $_POST['tibaAnak'];
    $tolakDewasa = $_POST['berangkatDewasa'];
    $tolakAnak = $_POST['berangkatAnak'];

    $query = "UPDATE spb SET `NO CETAK SPB` = ?, `NAMA KAPAL` = ?, GT = ?, BENDERA = ?, `NAMA PANGGIL` = ?, `TANGGAL TIBA` = ?, `PELABUHAN ASAL` = ?, `NO SPB TIBA` = ?, `TANGGAL TOLAK` = ?, `PELABUHAN TUJUAN` = ?, `NO SPB TOLAK` = ?, ETA = ?, `TIBA DEWASA` = ?, `TIBA ANAK` = ?, `TOLAK DEWASA` = ?, `TOLAK ANAK` = ? WHERE `NO` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $noCetakSPB, $kapalNama, $kapalGT, $kapalBendera, $namaPanggilan, $tanggalTiba, $pelabuhanAsal, $nomorSPBtiba, $tanggalTolak, $pelabuhanTujuan, $nomorSPBtolak, $eta, $tibaDewasa, $tibaAnak, $tolakDewasa, $tolakAnak);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

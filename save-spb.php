<?php
// save-spb.php
include 'db.php'; // Include your database connection file

$hari = date('Y-m-d'); // Get the current date
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
$no = $_POST['No'];


// Get kapal details
$query = "SELECT * FROM `data-kapal` WHERE NO = '$namaKapal'";
$result = mysqli_query($conn, $query);
$kapal = mysqli_fetch_assoc($result);


if ($kapal) {
    $kapalNama = $kapal['NAMA KAPAL'];
    $kapalGT = $kapal['GT'];
    $kapalBendera = $kapal['BENDERA'];

    // Get the current maximum NO from the spb table
    $query = "SELECT MAX(NO) as NO FROM spb";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $newNo = $row['NO'] + 1;

    if ($no) {
        $query = "UPDATE spb 
        SET 
          HARI = '$hari', 
          `NO CETAK SPB` = '$noCetakSPB', 
          `NAMA KAPAL` = '$kapalNama', 
          GT = '$kapalGT', 
          BENDERA = '$kapalBendera', 
          `NAMA PANGGIL` = '$namaPanggilan', 
          `TANGGAL TIBA` = '$tanggalTiba', 
          `PELABUHAN ASAL` = '$pelabuhanAsal', 
          `NO SPB TIBA` = '$nomorSPBtiba', 
          `TANGGAL TOLAK` = '$tanggalTolak', 
          `PELABUHAN TUJUAN` = '$pelabuhanTujuan', 
          `NO SPB TOLAK` = '$nomorSPBtolak', 
          ETA = '$eta', 
          `TIBA DEWASA` = '$tibaDewasa', 
          `TIBA ANAK` = '$tibaAnak', 
          `TOLAK DEWASA` = '$tolakDewasa', 
          `TOLAK ANAK` = '$tolakAnak'
        WHERE 
          NO = '$no'";
    } else {
        // Insert new record into spb table
        $query = "INSERT INTO spb (NO, HARI, `NO CETAK SPB`, `NAMA KAPAL`, GT, BENDERA, `NAMA PANGGIL`, `TANGGAL TIBA`, `PELABUHAN ASAL`, `NO SPB TIBA`, `TANGGAL TOLAK`, `PELABUHAN TUJUAN`, `NO SPB TOLAK`, ETA, `TIBA DEWASA`, `TIBA ANAK`, `TOLAK DEWASA`, `TOLAK ANAK`) VALUES ('$newNo', '$hari', '$noCetakSPB', '$kapalNama', '$kapalGT', '$kapalBendera', '$namaPanggilan', '$tanggalTiba', '$pelabuhanAsal', '$nomorSPBtiba', '$tanggalTolak', '$pelabuhanTujuan', '$nomorSPBtolak', '$eta', '$tibaDewasa', '$tibaAnak', '$tolakDewasa', '$tolakAnak')";
    }


    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save data: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Kapal not found.']);
}

mysqli_close($conn);

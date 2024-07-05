<?php
// edit-data-kapal.php
include 'db.php'; // Sesuaikan dengan koneksi database Anda

// Cek apakah ada kiriman form dari method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no = htmlspecialchars($_POST['No']);
    $namaKapal = htmlspecialchars($_POST['namaKapal']);
    $gt = htmlspecialchars($_POST['gt']);
    $bendera = htmlspecialchars($_POST['bendera']);

    // Query update data pada tabel `data-kapal`
    $sql = "UPDATE `data-kapal` SET `NAMA KAPAL` = ?, `GT` = ?, `BENDERA` = ? WHERE `NO` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $namaKapal, $gt, $bendera, $no);
    $hasil = $stmt->execute();

    // Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Data gagal disimpan']);
    }

    $stmt->close();
}

$conn->close();
?>

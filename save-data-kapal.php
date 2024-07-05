<?php
include 'db.php'; // Sesuaikan dengan koneksi database Anda

// Set header untuk JSON
header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => 'Form data missing.'];

try {
    $No = $_POST['No'] ?? null;
    $namaKapal = $_POST['namaKapal'] ?? null;
    $gt = $_POST['gt'] ?? null;
    $bendera = $_POST['bendera'] ?? null;
    $editMode = $_POST['editMode'] ?? 'false';

    if ($namaKapal && $gt && $bendera) {
        if ($editMode === 'true') {
            $stmt = $conn->prepare('UPDATE `data-kapal` SET `NAMA KAPAL` = ?, GT = ?, BENDERA = ? WHERE NO = ?');
            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $conn->error);
            }
            $stmt->bind_param('sisi', $namaKapal, $gt, $bendera, $No);
        } else {
            // Menentukan no_urut berikutnya
            $result = $conn->query('SELECT MAX(NO) AS max_no FROM `data-kapal`');
            if (!$result) {
                throw new Exception("Query failed: " . $conn->error);
            }
            $row = $result->fetch_assoc();
            $no_urut = $row['max_no'] + 1;

            $stmt = $conn->prepare('INSERT INTO `data-kapal` (`NAMA KAPAL`, GT, BENDERA, NO) VALUES (?, ?, ?, ?)');
            if (!$stmt) {
                throw new Exception("Prepare statement failed: " . $conn->error);
            }
            $stmt->bind_param('sisi', $namaKapal, $gt, $bendera, $no_urut);
        }

        if ($stmt->execute()) {
            $response = ['status' => 'success'];
        } else {
            throw new Exception("Execute failed: " . $stmt->error);
        }
    } else {
        throw new Exception("Form data missing.");
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>

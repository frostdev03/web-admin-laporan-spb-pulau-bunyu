<?php
include 'db.php'; // Sesuaikan dengan koneksi database Anda

$response = ['status' => 'error', 'message' => 'Data not found.'];

$No = $_GET['No'] ?? null;

if ($No) {
    $stmt = $conn->prepare('SELECT * FROM spb WHERE No = ?');
    $stmt->bind_param('i', $No);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $response = ['status' => 'success', 'data' => $result->fetch_assoc()];
    }
}

echo json_encode($response);
?>

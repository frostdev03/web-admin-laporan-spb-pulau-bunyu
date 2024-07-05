<?php
// delete-data-kapal.php
include 'db.php'; // Sesuaikan dengan koneksi database Anda

$response = ['status' => 'error', 'message' => 'Invalid request.'];

$No = $_GET['No'] ?? null;

if ($No) {
    // Mulai transaksi
    $conn->begin_transaction();

    try {
        $stmt = $conn->prepare('DELETE FROM `data-kapal` WHERE No = ?');
        $stmt->bind_param('i', $No);

        if ($stmt->execute()) {
            // Mengambil semua data dan memperbarui no_urut
            $result = $conn->query('SELECT No FROM `data-kapal` ORDER BY NO ASC');
            $no_urut = 1;

            while ($row = $result->fetch_assoc()) {
                $update_stmt = $conn->prepare('UPDATE `data-kapal` SET NO = ? WHERE No = ?');
                $update_stmt->bind_param('ii', $no_urut, $row['No']);
                $update_stmt->execute();
                $no_urut++;
            }

            $conn->commit();
            $response = ['status' => 'success'];
        } else {
            throw new Exception('Database operation failed.');
        }
    } catch (Exception $e) {
        $conn->rollback();
        $response = ['status' => 'error', 'message' => $e->getMessage()];
    }
}

echo json_encode($response);
?>

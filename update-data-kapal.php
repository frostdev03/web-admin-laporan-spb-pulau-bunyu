<?php
include 'db.php';

// Set header untuk JSON
header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => 'Update failed.'];

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $no = $_POST['No'];
        $namaKapal = $_POST['namaKapal'];
        $GT = $_POST['GT'];
        $bendera = $_POST['bendera'];

        $query = "UPDATE `data-kapal` SET `NAMA KAPAL` = ?, `GT` = ?, `BENDERA` = ? WHERE `NO` = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $conn->error);
        }
        $stmt->bind_param('ssss', $namaKapal, $GT, $bendera, $no);
        if ($stmt->execute()) {
            $response = ['status' => 'success', 'message' => 'Data updated successfully.'];
        } else {
            throw new Exception("Execute failed: " . $stmt->error);
        }
    } else {
        throw new Exception('Invalid request method.');
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>

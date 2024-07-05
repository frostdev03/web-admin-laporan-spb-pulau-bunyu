<?php
include 'db.php';

if (isset($_GET['No'])) {
    $No = $_GET['No'];
    $stmt = $conn->prepare("SELECT * FROM `data-kapal` WHERE NO = ?");
    $stmt->bind_param("i", $No);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Data not found']);
    }
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'No parameter missing']);
}
$conn->close();
?>

<?php
// delete-data-spb.php
include 'db.php'; // Include your database connection file

$no = $_GET['No'];

$query = "DELETE FROM spb WHERE NO = '$no'";
if (mysqli_query($conn, $query)) {
    // Update NO sequence
    $query = "SET @num := 0; UPDATE spb SET NO = @num := (@num+1); ALTER TABLE spb AUTO_INCREMENT = 1;";
    mysqli_multi_query($conn, $query);
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to delete data.']);
}
?>

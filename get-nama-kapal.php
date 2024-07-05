<?php
// get-nama-kapal.php
include 'db.php'; // Include your database connection file

$query = "SELECT NO, `NAMA KAPAL` FROM `data-kapal`";
$result = mysqli_query($conn, $query);

$kapalData = array();
while ($row = mysqli_fetch_assoc($result)) {
    $kapalData[] = $row;
}

header('Content-Type: application/json');
echo json_encode($kapalData);
?>

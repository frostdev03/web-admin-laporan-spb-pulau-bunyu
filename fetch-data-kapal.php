<?php
// fetch-data-kapal.php
include 'db.php'; // Sesuaikan dengan koneksi database Anda

$result = $conn->query('SELECT * FROM `data-kapal` ORDER BY NO ASC');

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['NO']) . '</td>'; // Menampilkan nomor urut
        echo '<td>' . htmlspecialchars($row['NAMA KAPAL']) . '</td>';
        echo '<td>' . htmlspecialchars($row['GT']) . '</td>';
        echo '<td>' . htmlspecialchars($row['BENDERA']) . '</td>';
        echo '<td>
                <button class="btn btn-sm btn-info" onclick="editData(\'' . urlencode($row['NO']) . '\')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(\'' . urlencode($row['NO']) . '\')">
                    <i class="fas fa-trash"></i>
                </button>
              </td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">Tidak ada data</td></tr>';
}
?>

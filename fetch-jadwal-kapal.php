<?php
// fetch-data-kapal.php
include 'db.php'; // Sesuaikan dengan koneksi database Anda

$result = $conn->query('SELECT * FROM spb ORDER BY NO ASC');

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['NO']) . '</td>';
        echo '<td>' . htmlspecialchars($row['NAMA KAPAL']) . '</td>';
        echo '<td>' . htmlspecialchars($row['TANGGAL TIBA']) . '</td>';
        echo '<td>' . htmlspecialchars($row['TANGGAL TOLAK']) . '</td>';
        echo '<td>' . htmlspecialchars($row['PELABUHAN ASAL']) . '</td>';
        echo '<td>' . htmlspecialchars($row['PELABUHAN TUJUAN']) . '</td>';
        echo '<td>
                <button class="btn btn-sm btn-info" onclick="editJadwal(\'' . urlencode($row['NO']) . '\')">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="deleteJadwal(\'' . urlencode($row['NO']) . '\')">
                    <i class="fas fa-trash"></i>
                </button>
              </td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">Tidak ada jadwal</td></tr>';
}

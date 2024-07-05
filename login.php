<?php
session_start();
$servername = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root"; // Sesuaikan dengan konfigurasi server Anda
$password = ""; // Sesuaikan dengan konfigurasi server Anda
$dbname = "laporan-spb-pulau-bunyu";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form
$user = $_POST['username'];
$pass = $_POST['password'];

// Mengecek username dan password di database
$sql = "SELECT * FROM user WHERE name = '$user' AND pass = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika login berhasil
    $_SESSION['username'] = $user;
    header("Location: index.php"); // Arahkan ke halaman dashboard
    exit();
} else {
    // Jika login gagal
    echo "Username atau password salah.";
}

$conn->close();
?>

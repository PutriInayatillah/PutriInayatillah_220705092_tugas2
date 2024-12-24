<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "cruddb");

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
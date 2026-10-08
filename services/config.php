<?php
// Konfigurasi dan koneksi database
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_perpustakaan';
$port = 3306; // ubah jika port MySQL Laragon berbeda

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');

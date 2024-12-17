<?php
// Koneksi ke database
$servername = "localhost"; // Nama server database
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi database
$dbname = "responsi"; // Nama database

// Membuat koneksi ke database menggunakan MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    // Jika koneksi gagal, hentikan skrip dan tampilkan pesan error
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil kecamatan dari URL
$kecamatan = $_GET['kecamatan']; // Mengambil nilai parameter 'kecamatan' dari query string

// Query untuk hapus data
$sql = "DELETE FROM data_pendidikan WHERE kecamatan='$kecamatan'"; // Menyusun kueri SQL untuk menghapus data berdasarkan kecamatan

// Menjalankan kueri
if ($conn->query($sql) === TRUE) {
    // Jika kueri berhasil dijalankan, tampilkan pesan sukses dan redirect ke halaman index.php
    echo "Data berhasil dihapus";
    header("Location: index.php");
} else {
    // Jika terjadi kesalahan saat menjalankan kueri, tampilkan pesan error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>

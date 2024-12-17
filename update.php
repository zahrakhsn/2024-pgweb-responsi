<?php
// Memeriksa apakah metode permintaan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id = $_POST['id'];
    $kecamatan = $_POST['kecamatan'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $nama_pendidikan = $_POST['nama_pendidikan'];
    $alamat = $_POST['alamat'];

    // Parameter koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "responsi";

    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa apakah koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menyiapkan query untuk memperbarui data
    $stmt = $conn->prepare("UPDATE data_pendidikan SET kecamatan = ?, x = ?, y = ?, nama_pendidikan = ?, alamat = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $kecamatan, $x, $y, $nama_pendidikan, $alamat, $id);

    // Menjalankan query dan memeriksa apakah berhasil
    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
        echo "<br><a href='index.php'>Kembali ke halaman utama</a>";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

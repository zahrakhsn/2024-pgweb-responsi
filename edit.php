<?php
// Memeriksa apakah metode permintaan adalah GET dan variabel 'kecamatan' ada dalam query string
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kecamatan'])) {
    // Mengambil nilai dari parameter 'kecamatan'
    $kecamatan = $_GET['kecamatan'];

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

    // Menyiapkan query untuk mengambil data berdasarkan kecamatan
    $stmt = $conn->prepare("SELECT * FROM data_pendidikan WHERE kecamatan = ?");
    $stmt->bind_param("s", $kecamatan);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Data Kecamatan</title>
            <style>
                form {
                    max-width: 500px;
                    margin: auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
                input, label {
                    display: block;
                    margin-bottom: 10px;
                    width: 100%;
                }
                input {
                    padding: 8px;
                    box-sizing: border-box;
                }
                input[type="submit"] {
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    padding: 10px;
                }
            </style>
        </head>
        <body>
            <form action="update.php" method="post">
                <h2>Edit Data Kecamatan</h2>
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id'], ENT_QUOTES); ?>">
                <label for="kecamatan">Kecamatan:</label>
                <input type="text" id="kecamatan" name="kecamatan" value="<?= htmlspecialchars($row['kecamatan'], ENT_QUOTES); ?>" required>

                <label for="x">x:</label>
                <input type="text" id="x" name="x" value="<?= htmlspecialchars($row['x'], ENT_QUOTES); ?>" required>

                <label for="y">y:</label>
                <input type="text" id="y" name="y" value="<?= htmlspecialchars($row['y'], ENT_QUOTES); ?>" required>

                <label for="nama_pendidikan">Nama Pendidikan:</label>
                <input type="text" id="nama_pendidikan" name="nama_pendidikan" value="<?= htmlspecialchars($row['nama_pendidikan'], ENT_QUOTES); ?>" required>

                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="<?= htmlspecialchars($row['alamat'], ENT_QUOTES); ?>" required>

                <input type="submit" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Data tidak ditemukan.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Parameter kecamatan tidak ditemukan.";
}
?>

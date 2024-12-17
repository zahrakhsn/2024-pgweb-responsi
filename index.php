<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peta Pendidikan Kabupaten Gunungkidul</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>

        
/* Styling untuk bagian Home */
#home {
    padding: 40px;
    background-color: rgba(255, 255, 255, 0.8); /* Warna putih transparan */
    border-radius: 10px; /* Sudut yang melengkung */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    max-width: 800px; /* Lebar maksimum */
    margin: 20px auto; /* Centering div */
    font-family: 'Times New Roman', sans-serif; /* Font yang bersih dan profesional */
    background-image: url('./icon/gunungkidul.jpg'); /* Gambar background */
    background-size: cover; /* Gambar memenuhi area background */
    background-position: center; /* Gambar ditempatkan di tengah */
    background-repeat: no-repeat; /* Gambar tidak diulang */
}

#home h2 {
    font-size: 28px;
    color:rgb(215, 245, 27); /* Warna biru lembut untuk judul */
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

#home p, #home p1 {
    font-size: 16px;
    color:rgb(254, 252, 252); /* Warna teks abu-abu gelap */
    line-height: 1.8; /* Jarak antarbaris yang nyaman */
    text-align: justify; /* Justify text untuk tampilan lebih rapi */
}

#home p1 {
    font-weight: bold; /* Menonjolkan paragraf pembuka */
}

/* Highlight khusus untuk beberapa kata kunci */
#home p span {
    color: #ff6600; /* Warna oranye untuk kata kunci */
    font-weight: bold;
}

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #CCFFFF;
        }

        /* Navbar Styles */
        .navbar {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap; /* Makes items wrap onto new lines */
    background-color: #00CCFF;
    padding: 10px;
    color: white;
    width: 100%;
    position: fixed; /* Fixed position to keep navbar on top */
    top: 0; /* Position the navbar at the very top */
    z-index: 1000; /* Ensures the navbar is above other elements */
}

.navbar a {
    color: white;
    padding: 14px 20px;
    text-decoration: none;
    text-align: center;
    font-weight: bold;
    flex-grow: 1; /* Makes each link fill up space evenly */
    text-align: center;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
}

/* Popup Styles */
#creator-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            z-index: 1001;
        }

        #creator-popup h3 {
            margin: 0;
            padding: 0;
        }

        #creator-popup p {
            margin: 10px 0;
        }

        .close-btn {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: #cc0000;
        }

        /* Title Styling */
        .main-title {
    text-align: center;
    font-size: 2em;
    margin: 50px 0 20px; /* Add margin-top to push the title down */
    font-weight: bold;
}

        /* Map Container */
        #map {
            width: 100%;
            height: 650px;
            margin-bottom: 20px;
        }

        /* Table Styles */
        table {
            width: 50%; /* Ubah ukuran tabel, misalnya menjadi 50% atau bisa pakai ukuran tetap seperti 400px */
            margin: 0 auto; /* Center tabel di tengah halaman */
            border-collapse: separate; /* Untuk radius sudut */
            border-spacing: 0; /* Hapus jarak antar sel */
            margin-bottom: 20px;
            border: 1px solid black; /* Tambahkan border keseluruhan tabel */
            border-radius: 10px; /* Radius melengkung untuk tabel */
            overflow: hidden; /* Agar isi tabel mengikuti bentuk melengkung */
        }
        th, td {
            padding: 5px; /* Kurangi padding untuk memperkecil sel */
            text-align: left;
            border: 1px solid black; /* Border untuk sel */
        }
        th {
            background-color: #f2f2f2;
        }
        tr:first-child th:first-child { /* Radius untuk sudut kiri atas */
            border-top-left-radius: 10px;
        }
        tr:first-child th:last-child { /* Radius untuk sudut kanan atas */
            border-top-right-radius: 10px;
        }
        tr:last-child td:first-child { /* Radius untuk sudut kiri bawah */
            border-bottom-left-radius: 10px;
        }
        tr:last-child td:last-child { /* Radius untuk sudut kanan bawah */
            border-bottom-right-radius: 10px;
        }
        /* Form Styles */
        .form-container {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 12px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .form-container button:hover {
            background-color: #555;
        }

        /* Footer Style */
        #footer {
            margin-top: 30px;
            padding: 20px;
            background-color: #333;
            color: white;
            text-align: center;
        }

         /* Smooth scrolling */ 
         html { 
           scroll-behavior:smooth; 
         } 
    </style>
</head>
<body>
    <!-- Navbar Section -->
    <div class="navbar">
        <span class="title">Kabupaten Gunungkidul</span>
        <div>
        <a href="#home">Beranda</a>
          <a href="#map">Peta</a>
          <a href="#data-table">Tabel Data</a>
          <a href="#add-data">Tambah Data</a>
          <a href="javascript:void(0);" onclick="openPopup()">Pembuat</a> <!-- Added click event here -->
      </div>
    </div>

    <!-- Pop-up Section -->
    <div id="creator-popup">
        <div id="popup-content">
            <h3>Informasi Pembuat</h3>
            <p>Nama: Zahra Khusnul Khotimah</p>
            <p>NIM: 23/522563/SV/23722</p>
            <a href="https://github.com/zahrakhsn" target="_blank">github.com/zahrakhsn</a></p>
            <button class="close-btn" onclick="closePopup()">Tutup</button>
        </div>
    </div>

    <h1 class="main-title">Peta Pendidikan Kabupaten Gunungkidul</h1>

    <!-- Section for Beranda (Home) -->
<div id="home" style="padding: 20px;">
    <h2>Selamat Datang di Peta Pendidikan Kabupaten Gunungkidul</h2>
        <p> Kabupaten Gunungkidul terletak di bagian selatan Provinsi Daerah Istimewa Yogyakarta, Indonesia, dan dikenal dengan keindahan alamnya yang luar biasa, termasuk pantai-pantai eksotis, gua-gua alami, serta pegunungan karst yang menakjubkan. Namun, Gunungkidul juga memiliki tantangan dalam hal pemerataan akses pendidikan di berbagai daerah. Oleh karena itu, peta ini dirancang untuk membantu masyarakat, pengambil kebijakan, serta berbagai pihak terkait untuk memahami lebih jelas distribusi beberapa lembaga pendidikan yang ada di Kabupaten Gunungkidul.

Melalui peta interaktif ini, dapat dengan mudah menemukan bebrapa elokasi sekolah dan lembaga pendidikan yang terdaftar di wilayah ini. Setiap titik di peta menandakan sebuah institusi pendidikan, lengkap dengan informasi mengenai nama lembaga, alamat, dan kecamatan. Dengan fitur ini, diharapkan masyarakat dapat mengakses informasi pendidikan secara lebih mudah, serta dapat memetakan potensi dan tantangan yang ada di bidang pendidikan.

Navigasi di atas memberikan akses ke berbagai fitur, seperti menjelajahi peta, melihat dan menganalisis data pendidikan, serta menambah informasi baru untuk memastikan bahwa data yang ada tetap relevan dan akurat. Dengan adanya peta ini, kami berharap dapat memberikan kontribusi positif dalam meningkatkan kualitas pendidikan di Gunungkidul serta mendukung upaya pemerataan akses pendidikan bagi seluruh masyarakat, terutama di daerah-daerah yang mungkin memiliki keterbatasan informasi.</p>
</div>

    <!-- Map Section -->
    <div id="map"></div>

    <!-- Data Table Section -->
    <h2 id="data-table">Data Pendidikan Kabupaten Gunungkidul</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "responsi";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengambil data dari database
$sql = "SELECT * FROM data_pendidikan"; // Query untuk memilih semua data dari tabel 'data_pendidikan'
$result = $conn->query($sql); // Menjalankan query dan menyimpan hasilnya ke dalam variabel $result

$data_pendidikan = array(); // Membuat array kosong untuk menyimpan data pendidikan

// Memeriksa apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    // Jika ada hasil, buat tabel HTML untuk menampilkan data
    echo "<table> <tr> <th>Kecamatan</th> <th>X</th> <th>Y</th> <th>Nama_Pendidikan</th> <th>Alamat</th> <th>Aksi</th> </tr>";
    
    // Menampilkan data satu per satu dalam tabel
    while($row = $result->fetch_assoc()) {
        // Menampilkan data dalam setiap baris tabel dan menambahkan fitur edit dan hapus
        echo "<tr> 
                <td>" . htmlspecialchars($row["kecamatan"], ENT_QUOTES) . "</td> 
                <td>" . htmlspecialchars($row["x"], ENT_QUOTES) . "</td> 
                <td>" . htmlspecialchars($row["y"], ENT_QUOTES) . "</td> 
                <td>" . htmlspecialchars($row["nama_pendidikan"], ENT_QUOTES) . "</td> 
                <td align='right'>" . htmlspecialchars($row["alamat"], ENT_QUOTES) . "</td> 
                <td> 
                    <a href='edit.php?kecamatan=" . urlencode($row["kecamatan"]) . "'>Edit</a> | 
                    <a href='hapus.php?kecamatan=" . urlencode($row["kecamatan"]) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a> 
                </td> 
              </tr>";
        
        // Menyimpan data yang diambil ke dalam array $data_pendidikan untuk digunakan nanti
        $data_pendidikan[] = $row;
    }
    echo "</table>"; // Menutup tag tabel setelah semua data ditampilkan
} else {
    // Jika tidak ada data, tampilkan pesan "Tidak ada hasil"
    echo "Tidak ada hasil";
}

    // Handle adding data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $kecamatan = $_POST['kecamatan'];
      $x = $_POST['x'];
      $y = $_POST['y'];
      $nama_pendidikan = $_POST['nama_pendidikan'];
      $alamat = $_POST['alamat'];

      // Prepare and bind
      $stmt = $conn->prepare("INSERT INTO data_pendidikan (kecamatan, x, y, nama_pendidikan, alamat) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssi", $kecamatan, $x, $y, $nama_pendidikan, $alamat);

      if ($stmt->execute()) {
          echo "<p>Data berhasil ditambahkan!</p>";
          echo "<meta http-equiv='refresh' content='0'>"; // Refresh halaman untuk menampilkan data terbaru
      } else {
          echo "<p>Terjadi kesalahan: " . $stmt->error . "</p>";
      }

      $stmt->close();
    }

    $conn->close();
    ?>

    <!-- Form for Adding Data -->
    <div class="form-container" id="add-data">
      <h2>Tambah Data Pendidikan</h2>
      <form action="" method="post">
          <input type="text" name="kecamatan" placeholder="Kecamatan" required>
          <input type="text" name="x" placeholder="Koordinat X (longitude)" required>
          <input type="text" name="y" placeholder="Koordinat Y (latitude)" required>
          <input type="text" name="nama_pendidikan" placeholder="Nama Pendidikan" required>
          <input type="text" name="alamat" placeholder="Alamat" required>
          <button type="submit">Tambah Data</button>
          
      </form>
   </div>

   <!-- Leaflet JavaScript -->
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

   <!-- Initialize Map -->
   <script>
       // Create a map centered on a default location
       var map = L.map('map').setView([-7.9999, 110.6333], 11);  // coordinates for Gunungkidul

// Add the OpenStreetMap base layer
var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Add a satellite base layer (you can use other providers such as ESRI or Stamen)
var satelliteLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://opentopomap.org/copyright">OpenTopoMap</a> contributors'
});

// Add other overlays if you have specific data points (example)
var educationLayer = L.layerGroup().addTo(map);

// Loop through your educational data (from PHP) to add markers to the map
var educationData = <?php echo json_encode($data_pendidikan); ?>;
educationData.forEach(function(item) {
    var marker = L.marker([item.y, item.x]).addTo(educationLayer);
    marker.bindPopup("<strong>" + item.nama_pendidikan + "</strong><br>" + item.alamat);
});

// Layer control (for selecting and toggling layers)
var baseLayers = {
    "OpenStreetMap": osmLayer,
    "Satellite": satelliteLayer
};

var overlays = {
    "Institusi Pendidikan": educationLayer
};

L.control.layers(baseLayers, overlays).addTo(map);

       // Convert PHP array to JavaScript
       var dataPendidikan = <?php echo json_encode($data_pendidikan); ?>;

       // Add markers for each data point using x and y as coordinates
       dataPendidikan.forEach(function(item) {
           var y = parseFloat(item.y); // Latitude
           var x = parseFloat(item.x); // Longitude
           L.marker([y, x])
               .bindPopup("<b>" + item.kecamatan + "</b><br>" + item.nama_pendidikan + "<br>" + item.alamat)
               .addTo(map);
       });

       // Tambahkan WMS layer dari GeoServer
       var geoserverLayer = L.tileLayer.wms('http://localhost:8080/geoserver/responsi/wms', {
        layers: 'ADMINISTRASIDESA_AR_25K', // Ganti dengan nama layer di GeoServer
        format: 'image/png',
        transparent: true,
        attribution: 'GeoServer',
        });
        geoserverLayer.addTo(map);

        // Tambahkan WMS layer dari GeoServer
       var geoserverLayer = L.tileLayer.wms('http://localhost:8080/geoserver/responsi/wms', {
        layers: 'JALAN_LN_25K', // Ganti dengan nama layer di GeoServer
        format: 'image/png',
        transparent: true,
        attribution: 'GeoServer',
        });
        geoserverLayer.addTo(map);

/// Mendefinisikan kontrol watermark untuk menampilkan logo di peta
L.Control.Watermark = L.Control.extend({
    // Fungsi onAdd dijalankan ketika kontrol ditambahkan ke peta
    onAdd: function (map) {
        var img = L.DomUtil.create('img'); // Membuat elemen gambar baru

        img.src = 'icon/logo_SV_UGM.png'; // Menentukan sumber gambar (logo)
        img.style.width = '300px'; // Menentukan lebar gambar menjadi 300px

        return img; // Mengembalikan elemen gambar sebagai kontrol watermark
    },

    // Fungsi onRemove dijalankan ketika kontrol dihapus dari peta
    onRemove: function (map) {
        // Tidak ada tindakan yang dilakukan di sini karena watermark hanya berupa gambar statis
    }
});

// Menambahkan metode untuk membuat kontrol watermark dengan opsi tertentu
L.control.watermark = function (opts) {
    return new L.Control.Watermark(opts); // Mengembalikan kontrol watermark dengan opsi yang diberikan
}

// Menambahkan kontrol watermark ke peta dengan posisi di kiri bawah
L.control.watermark({ position: 'bottomleft' }).addTo(map);


        // Popup functions
        function openPopup() {
            document.getElementById("creator-popup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("creator-popup").style.display = "none";
        }
        
   </script>

</body>
</html>

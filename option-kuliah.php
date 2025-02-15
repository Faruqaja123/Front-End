<?php
// Kode PHP untuk menyambungkan ke database
$servername = "localhost";   // Biasanya localhost
$username   = "root";        // Ganti dengan username database Anda
$password   = "root";        // Ganti dengan password database Anda (jika ada)
$dbname     = "tspkl2025";   // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika koneksi berhasil, Anda dapat menulis kode selanjutnya di bawah ini
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study</title>
    <style>
        /* Style Umum */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #007bff;
            padding: 15px 30px;
        }
        .menu a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        .menu a:hover {
            text-decoration: underline;
        }
        /* Carousel */
        .carousel {
            position: relative;
            width: 100%;
            max-width: 1200px; /* Memperbesar ukuran gambar */
            height: 500px; /* Tambahkan tinggi agar tetap proporsional */
            margin: 300px auto;
            overflow: hidden;
        }
        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }
        .carousel-image {
            width: 100%;
            flex: 0 0 100%;
            object-fit: cover;
            height: 100%;
        }
        /* Tombol Navigasi */
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 15px;
            cursor: pointer;
            font-size: 24px;
        }
        .prev { left: 20px; }
        .next { right: 20px; }
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        /* Welcome Section */
        .welcome-section {
            padding: 20px;
            background: white;
            margin: 20px;
        }
        /* Footer */
        footer {
            background: #007bff;
            color: white;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="css/option-kuliah.css">
</head>
<body>
    <!-- Header Navigation -->
    <header>
        <div class="navbar">
            <div class="logo-container">
                <img src="IMG/Logo.1.png" alt="Logo" class="logo">
            </div>
            <nav class="menu">
                <a href="index.php">BERANDA</a>
                <a href="panduan.php">PANDUAN</a>
                <a href="data-alumni.php">DATA ALUMNI</a>
                <a href="kuesionerbaru.php">ISI KUESIONER</a> 
                <a href="statistik.php">STATISTIK</a>
                <a href="login.php" class="login">LOGOUT</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Data Diri Alumni</h2>
        <!-- Contoh form untuk data alumni -->
        <form action="simpan-kuliah.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" id="nomor_hp" name="nomor_hp" required>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan Ke</label>
                <select id="angkatan" name="angkatan" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label for="kompetensi_keahlian">kompetensi_keahlian Keahlian</label>
                <select id="kompetensi_keahlian" name="kompetensi_keahlian" required>
                    <option value="RPL">RPL</option>
                    <option value="PBS">PBS</option>
                </select>
            </div>
            <h4>Kegiatan Setelah Lulus</h4>
            <div class="activities">
                <button type="button">Kuliah</button>
            </div>
            <div class="form-group">
                <label>Nama universitas Tinggi</label>
                <input type="text" name="nama_universitas" required>
            </div>
            <div class="form-group">
                <label>Alamat universitas Tinggi</label>
                <input type="text" name="alamat_universitas" required>
            </div>
            <div class="form-group">
                <label>Fakultas / Jurusan</label>
                <input type="text" name="fakultas" required>
            </div>
            <div class="form-group">
                <label>Semester</label>
                <input type="text" name="Semester" required>
            </div>
            <div class="form-group">
                <label>Bulan dan Tahun Masuk Kuliah</label>
                <input type="date" name="TahunMasukUniversitas" required>
            </div>
           <!-- Tombol Simpan dan Batal -->
    <div class="buttons">
      <button type="submit">Simpan</button>
      <button type="button" onclick="window.location.href='status-alumni.php'">Batal</button>
    </div>
        </form>
    </div>

    <footer>
        <p>Made With Kelompok 4 | &copy; 2025</p>
    </footer>
</body>
</html>

<?php
// Kode PHP untuk menyambungkan ke database
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

// Koneksi ke database sudah berhasil, silakan gunakan $conn jika diperlukan pada halaman ini.
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
<header class="navbar">
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
</header>

<div class="container">
    <h2>Data Diri Alumni</h2>
    <form method="POST" action="simpan-bekerja-kuliah.php">
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
            <label for="no_hp">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp" required>
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
            <label for="kompetensi">Kompetensi Keahlian</label>
            <select id="kompetensi" name="kompetensi" required>
                <option value="RPL">RPL</option>
                <option value="PBS">PBS</option>
            </select>
        </div>

        <h4>Kegiatan Setelah Lulus Kuliah</h4>
        <div class="form-group">
            <label for="nama_universitas">Nama Perguruan Tinggi</label>
            <input type="text" id="nama_universitas" name="nama_universitas">
        </div>
        <div class="form-group">
            <label for="alamat_universitas">Alamat Perguruan Tinggi</label>
            <input type="text" id="alamat_universitas" name="alamat_universitas">
        </div>
        <div class="form-group">
            <label for="fakultas">Fakultas / Jurusan</label>
            <input type="text" id="fakultas" name="fakultas">
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" id="semester" name="semester">
        </div>
        <div class="form-group">
            <label for="tahun_masuk_kuliah">Bulan dan Tahun Masuk Kuliah</label>
            <input type="date" id="tahun_masuk_kuliah" name="tahun_masuk_kuliah">
        </div>

        <h4>Kegiatan Setelah Lulus Bekerja</h4>
        <div class="form-group">
            <label for="nama_perusahaan">Nama Perusahaan / Industri / Lembaga</label>
            <input type="text" id="nama_perusahaan" name="nama_perusahaan">
        </div>
        <div class="form-group">
            <label for="alamat_perusahaan">Alamat Perusahaan / Industri / Lembaga</label>
            <input type="text" id="alamat_perusahaan" name="alamat_perusahaan">
        </div>
        <div class="form-group">
            <label for="nomor_perusahaan">Nomor Telepon Perusahaan</label>
            <input type="text" id="nomor_perusahaan" name="nomor_perusahaan">
        </div>
        <div class="form-group">
            <label for="sektor_perusahaan">Sektor Perusahaan / Industri</label>
            <input type="text" id="sektor_perusahaan" name="sektor_perusahaan">
        </div>
        <div class="form-group">
            <label for="tahun_masuk_kerja">Bulan dan Tahun Masuk Kerja</label>
            <input type="date" id="tahun_masuk_kerja" name="tahun_masuk_kerja">
        </div>

        <div class="buttons">
    <button type="submit" class="submit">Simpan</button>
    <button type="button" class="cancel" onclick="window.location.href='angkatan-1.php'">Batal</button>
</div>

    </form>
</div>

<footer>
    <p>Made With Kelompok 4 | &copy; 2025</p>
</footer>
</body>
</html>

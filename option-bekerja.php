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
    <link rel="stylesheet" href="css/option-bekerja.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo-container">
                <img src="IMG/Logo.1.png" alt="Logo" class="logo">
            </div>
            <ul class="nav-links">
                <li><a href="#">BERANDA</a></li>
                <li><a href="#">PANDUAN</a></li>
                <li><a href="#">DATA ALUMNI</a></li>
                <li><a href="#">STATISTIK</a></li>
                <li><a href="#" class="logout">LOGOUT</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2>Data Diri Alumni</h2>
            <!-- Mulai Form untuk input data -->
            <form action="simpan-bekerja.php" method="POST">
                <!-- Data Pribadi Alumni -->
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
                    
                    <label for="kompetensi">Kompetensi Keahlian</label>
                    <select id="kompetensi" name="kompetensi" required>
                        <option value="RPL">RPL</option>
                        <option value="PBS">PBS</option>
                    </select>
                </div>
                <h4>Kegiatan Setelah Lulus</h4>
                <div class="activities">
                    <button type="button">Bekerja</button>
                </div>
                <!-- Data Pekerjaan -->
                <div class="form-group">
                    <label>Nama Perusahaan / Industri / Lembaga</label>
                    <input type="text" name="nama_perusahaan" required>
                </div>
                <div class="form-group">
                    <label>Alamat Perusahaan / Industri / Lembaga</label>
                    <input type="text" name="alamat_perusahaan" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon Perusahaan</label>
                    <input type="text" name="nomor_perusahaan" required>
                </div>
                <div class="form-group">
                    <label>Sektor Perusahaan / Industri</label>
                    <input type="text" name="sektor_perusahaan" required>
                </div>
                <div class="form-group">
                    <label>Bulan dan Tahun Masuk Kerja</label>
                    <input type="date" name="tahun_masuk_kerja" required>
                </div>
                <!-- Tombol Aksi -->
                <div class="buttons">
                    <button type="button" class="cancel" onclick="window.location.href='status-alumni.php'">Batal</button>
                    <button type="submit" class="submit">Simpan</button>
                </div>
            </form>
            <!-- Akhir Form -->
        </div>
    </main>
    <footer>
        <p>Made With Kelompok 4 | &copy; 2025</p>
    </footer>
</body>
</html>

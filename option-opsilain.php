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

// Menyimpan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $angkatan = $_POST['angkatan'];
    $kompetensi = $_POST['kompetensi'];
    $keterangan = $_POST['keterangan'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO opsilain (nama, nisn, alamat, jenis_kelamin, email, no_hp, angkatan, kompetensi, keterangan) 
            VALUES ('$nama', '$nisn', '$alamat', '$jenis_kelamin', '$email', '$no_hp', '$angkatan', '$kompetensi', '$keterangan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study</title>
    <link rel="stylesheet" href="css/option-opsilain.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo-container">
            <img src="IMG/Logo.1.png" alt="Logo" class="logo">
        </div>
        <ul class="nav-links">
            <a href="index.php">BERANDA</a>
            <a href="panduan.php">PANDUAN</a>
            <a href="data-alumni.php">DATA ALUMNI</a>
            <a href="kuesionerbaru.php">ISI KUESIONER</a> 
            <a href="statistik.php">STATISTIK</a>
            <a href="login.php" class="login">LOGOUT</a>
        </ul>
    </nav>

    <div class="container">
        <h2>Data Diri Alumni</h2>

        <!-- Form untuk mengirim data -->
        <form method="POST" action="simpan-opsilain.php">
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

    <h4>Kegiatan Setelah Lulus</h4>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" required>
    </div>

    <div class="buttons">
        <!-- Tombol Batal -->
        <button type="button" class="cancel" onclick="window.location.href='status-alumni.php'">Batal</button>

        <!-- Tombol Simpan -->
        <button type="submit" class="submit">Simpan</button>
    </div>
</form>

    </div>

    <footer>
        <p>Made With Kelompok 4 | &copy; 2025</p>
    </footer>
</header>
</body>
</html>

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

<div class="container">
    <h2>Data Diri Alumni</h2>
    <form method="POST" action="proses.php"> <!-- Tambahkan form -->
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
            <select id="jenis_kelamin" name="jenis_kelamin">
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
            <select id="angkatan" name="angkatan">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <label for="kompetensi">Kompetensi Keahlian</label>
            <select id="kompetensi" name="kompetensi">
                <option value="RPL">RPL</option>
                <option value="PBS">PBS</option>
            </select>
        </div>

        <h4>Kegiatan Setelah Lulus</h4>
        <div class="activities">
            <button type="button">Bekerja</button>
            <button type="button">Kuliah</button>
            <button type="button">Berwirausaha</button>
            <button type="button">Opsi Lain</button>
        </div>

        <div class="buttons">
            <button type="reset" class="cancel">Batal</button>
            <button type="submit" class="submit">Simpan</button>
        </div>
    </form>
</div>

<footer>
    <p>Made With Kelompok 4 | &copy; 2025</p>
</footer>

</body>
</html>

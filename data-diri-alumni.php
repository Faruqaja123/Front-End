<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study</title>
    <link rel="stylesheet" href="css/data-diri-alumni.css">
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
    <div class="container">
        <h2>Data Diri Alumni</h2>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama">
            <label for="nisn">NISN</label>
            <input type="text" id="nisn" name="nisn">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email">
            <label for="no_hp">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp">
        </div>
        <div class="form-group">
            <label for="angkatan">Angkatan Ke</label>
            <select id="angkatan" name="angkatan">
                <option value="2020">1</option>
                <option value="2021">2</option>
                <option value="2022">3</option>
                <option value="2023">4</option>
                <option value="2023">5</option>
            </select>
            <label for="kompetensi">Kompetensi Keahlian</label>
            <select id="kompetensi" name="kompetensi">
                <option value="PBS">RPL</option>
                <option value="PBS">PBS</option>
            </select>
        </div>
        <h4>Kegiatan Setelah Lulus</h4>
        <div class="activities">
            <button>Bekerja</button>
            <button>Kuliah</button>
            <button>Berwirausaha</button>
            <button>Opsi Lain</button>
        </div>
        <div class="buttons">
            <button class="cancel">Batal</button>
            <button class="submit">Simpan</button>
        </div>
    </div>
    <footer>
        <p>Made With Kelompok 4 | &copy; 2025</p>
    </footer>

</header>
</header>
</body>
</html>

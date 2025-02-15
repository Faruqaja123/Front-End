<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Alumni</title>
    <link rel="stylesheet" href="css/panduan.css">
</head>
<body>
 <!-- Header Navigation -->
 <header>
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
</header>

<style>
/* Navbar Styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #007bff;
    padding: 10px 120px;
}

/* Logo Styling */
.logo-container {
    display: flex;
    align-items: center;
}

.logo {
    width: 250px; /* Sesuaikan ukuran logo */
    height: auto;
}

/* Menu Styling */
.menu {
    display: flex;
    gap: 20px;
}

.menu a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    padding: 8px 12px;
}

.menu a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        align-items: center;
    }
    
    .menu {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    .logo {
        width: 40px; /* Kecilkan logo untuk layar kecil */
    }
}
</style>
    <!-- Main Content -->
    <main class="content">
        <h1><span>Panduan ALUMNI</span></h1>
        <p class="subtext">smk-bp subulul huda</p>

        <div class="icon">
            <img src="IMG/education-logo-design-inspiration_139869-290-removebg-preview 1.png" alt="Graduation Cap" />
        </div>

        <p class="description">
            Terdapat cara penggunaan<br>yang sesuai dengan data diri Anda,<br>
            "Ingin tahu cara kerja fitur ini? Cek panduan<br>selengkapnya di sini!"<br>
            <a href="https://faruqaja123.github.io/panduan-fikssss/" target="_blank" class="external-link">Klik di sini untuk Panduan Lengkap</a>
        </p>

        <div class="divider">---------</div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>Made With Kelompok 4 | © 2025</p>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Angkatan</title>
    <style>
        body
         {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            text-align: center;
            margin: 0;
            padding: 0;
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
        .container {
            width: 320px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .angkatan-list {
            list-style: none;
            padding: 0;
        }

        .angkatan-list li {
            background-color: #007bff;
            color: white;
            padding: 12px;
            margin: 8px 0;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .angkatan-list li:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
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
    padding: 10px 30px;
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
<div class="container">
        <h2>Pilih Status Anda</h2>
        <ul class="angkatan-list">
            <li onclick="window.location.href='option-kuliah.php'">Kuliah</li>
            <li onclick="window.location.href='option-bekerja.php'">bekerja</li>
            <li onclick="window.location.href='option-berwirausaha.php'">berwirausaha</li>
            <li onclick="window.location.href='option-bekerja-kuliah.php'">bekerja-kuliah</li>
            <li onclick="window.location.href='option-opsilain.php'">opsi lain</li>
        
        </ul>
    </div>
</body>
</body>
</html>

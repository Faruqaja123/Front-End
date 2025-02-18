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
            margin: 30px auto;
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
            <a href="logout.php" class="logout">LOGOUT</a>
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

    <!-- Carousel -->
    <div class="carousel">
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <div class="carousel-track">
            <img src="IMG/DSC00443 (3).jpg" alt="Graduation 1" class="carousel-image">
            <img src="IMG/DSC00206.JPG" alt="Graduation 2" class="carousel-image">
            <img src="IMG/DSC00346.JPG" alt="Graduation 3" class="carousel-image">
            <img src="IMG/DSC00150.JPG" alt="Graduation 4" class="carousel-image">
        </div>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>

    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1>Selamat Datang!</h1>
        <h2>Tracer <span class="highlight">Study</span></h2>
        <p>Kami mempersembahkan aplikasi Tracer Study SMK BP Subulul Huda, sebuah platform yang dirancang untuk menghubungkan alumni dengan sekolah. Aplikasi ini bertujuan untuk mengumpulkan data dan informasi mengenai perkembangan alumni, serta untuk memperkuat jaringan antara alumni dan sekolah.</p>
    </div>

    <!-- Footer -->
    <footer>
        <p>Made With Kelompok 4 | &copy; 2025</p>
    </footer>

    <!-- JavaScript untuk Carousel -->
    <script>
        let currentIndex = 0;

        function showSlide(index) {
            const track = document.querySelector(".carousel-track");
            const totalSlides = document.querySelectorAll(".carousel-image").length;
            
            if (index >= totalSlides) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = totalSlides - 1;
            } else {
                currentIndex = index;
            }

            const newPosition = -currentIndex * 100 + "%";
            track.style.transform = "translateX(" + newPosition + ")";
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        // Auto slide setiap 3 detik
        setInterval(() => {
            nextSlide();
        }, 3000);
    </script>

</body>
</html>

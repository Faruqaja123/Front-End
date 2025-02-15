<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study</title>
    <link rel="stylesheet" href="css/dashboar-logout.css">
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

<div class="welcome-section">
    <div class="text-container" id="text">
        <h1>Selamat Datang!</h1>
        <h2><span class="highlight">Tracer Study</span></h2>
        <p>SMK BP Subulul Huda</p>
    </div>
</div>

<footer>
    <p>Made With Kelompok 4 | &copy; 2025</p>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.getElementById("text").classList.add("show");
        }, 500);
    });
</script>
<script src="b.js"></script>
</body>
</html>

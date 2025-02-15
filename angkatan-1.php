<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "root"; // Sesuaikan dengan konfigurasi MySQL-mu
$dbname = "tspkl2025";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah Nama Alumni
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nama"])) {
    $nama = trim($_POST["nama"]);
    if (!empty($nama)) {
        $stmt = $conn->prepare("INSERT INTO angkatan_1 (nama) VALUES (?)");
        $stmt->bind_param("s", $nama);
        if ($stmt->execute()) {
            $success_message = "Nama berhasil ditambahkan!";
        } else {
            $error_message = "Gagal menambahkan nama!";
        }
        $stmt->close();
    } else {
        $error_message = "Nama tidak boleh kosong!";
    }
}

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Pencarian
$search = isset($_GET['search']) ? $_GET['search'] : "";
$search_query = $search ? "WHERE nama LIKE '%$search%'" : "";

// Hitung total data
$total_query = "SELECT COUNT(*) FROM angkatan_1 $search_query";
$total_result = $conn->query($total_query);
$total_data = $total_result->fetch_row()[0];
$total_pages = ceil($total_data / $limit);

// Ambil data dengan batas limit
$sql = "SELECT nama FROM angkatan_1 $search_query LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header {
            background: white;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .search-bar {
            text-align: right;
            margin-bottom: 10px;
        }

        .search-bar input {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-container {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-container input {
            padding: 10px;
            width: 60%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            text-decoration: none;
            padding: 8px 12px;
            margin: 5px;
            border: 1px solid #ddd;
            color: #333;
            border-radius: 5px;
        }

        .pagination a.active {
            background: #4CAF50;
            color: white;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
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
    .floating-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #007bff;
    color: white;
    padding: 15px 20px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
}

.floating-button:hover {
    background: #0056b3;
}

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

<header>
    <h1>DATA ALUMNI ANGKATAN 1 SMK-BP SUBULUL HUDA</h1>
</header>

<div class="container">
    <!-- Notifikasi -->
    <?php if (isset($success_message)) : ?>
        <div class="message success"><?= $success_message ?></div>
    <?php endif; ?>

    <?php if (isset($error_message)) : ?>
        <div class="message error"><?= $error_message ?></div>
    <?php endif; ?>

    <!-- Form Pencarian -->
    <div class="search-bar">
        <form method="GET">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">🔍</button>
        </form>
    </div>

    <!-- Tabel Data Alumni -->
    <table>
        <tr>
            <th>NAMA</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["nama"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='1'>Tidak ada data ditemukan</td></tr>";
        }
        ?>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i ?>&search=<?= htmlspecialchars($search) ?>" class="<?= $i == $page ? 'active' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
</div>

<footer>
    <p>Made With Kelompok 4 | © 2025</p>
</footer>
<a href="status-alumni.php" class="floating-button">Isi Kuesioner</a>

</body>
</html>

<?php $conn->close(); ?>

<?php
// Konfigurasi database
$host = "localhost";
$db_user = "root";
$db_pass = "root"; // Sesuaikan dengan konfigurasi MySQL-mu
$dbname = "tspkl2025";

$conn = new mysqli($host, $db_user, $db_pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah Data Alumni (Username dan NISN)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["nisn"])) {
    $username_input = trim($_POST["username"]);
    $nisn = trim($_POST["nisn"]);
    if (!empty($username_input) && !empty($nisn)) {
        $stmt = $conn->prepare("INSERT INTO login (username, nisn) VALUES (?, ?)");
        $stmt->bind_param("ss", $username_input, $nisn);
        if ($stmt->execute()) {
            $success_message = "Data berhasil ditambahkan!";
        } else {
            $error_message = "Gagal menambahkan data!";
        }
        $stmt->close();
    } else {
        $error_message = "Username dan NISN tidak boleh kosong!";
    }
}

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Pencarian (berdasarkan username)
$search = $_GET['search'] ?? "";
// Pastikan nilai $search sudah di-escape untuk query dan HTML
$search_safe = $conn->real_escape_string($search);
$search_query = $search ? "WHERE username LIKE '%$search_safe%'" : "";

// Hitung total data
$total_query = "SELECT COUNT(*) FROM login $search_query";
$total_result = $conn->query($total_query);
$total_data = $total_result->fetch_row()[0];
$total_pages = ceil($total_data / $limit);

// Ambil data dengan batas limit
$sql = "SELECT username, nisn FROM login $search_query LIMIT $start, $limit";
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
            margin-bottom: 10px;
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
        .logo {
        width: 250px; /* Kecilkan logo untuk layar kecil */
    }
    </style>
    
</head>
<body>
    <!-- Header Navigation -->
    <header>
        <div class="navbar">
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
        </div>
    </header>

    <header>
        <h1>DATA ALUMNI SMK-BP SUBULUL HUDA</h1>
    </header>

    <div class="container">
        <!-- Notifikasi -->
        <?php if (isset($success_message)) : ?>
            <div class="message success"><?= htmlspecialchars($success_message) ?></div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="message error"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>

        <!-- Form Tambah Data Alumni -->
        <div class="form-container">
            <form method="POST">
                <input type="text" name="username" placeholder="Tambah Username Alumni">
                <input type="text" name="nisn" placeholder="Tambah NISN Alumni">
                <button type="submit">Tambah</button>
            </form>
        </div>

        <!-- Form Pencarian -->
        <div class="search-bar">
            <form method="GET">
                <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit">🔍</button>
            </form>
        </div>

        <table>
    <tr>
        <th>NISN</th>
        <th>USERNAME</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row["nisn"] ?? "", ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($row["username"] ?? "", ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Tidak ada data ditemukan</td>
        </tr>
    <?php endif; ?>
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

</body>
</html>

<?php $conn->close(); ?>

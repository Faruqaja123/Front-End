<?php
session_start(); // Memulai sesi

// Konfigurasi koneksi database
$host = "localhost";
$username = "root";
$password = "root"; // Sesuaikan dengan konfigurasi database kamu
$dbname = "tspkl2025"; 

$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$error_message = ""; // Variabel untuk pesan error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $nisn = $_POST['nisn'];

    // Cek apakah NISN ada di database
    $sql = "SELECT * FROM login WHERE nisn = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nisn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // NISN ditemukan, login berhasil
        $_SESSION['username'] = $user; // Simpan sesi username
        $_SESSION['nisn'] = $nisn; // Simpan sesi NISN

        header("Location: index.php"); // Redirect ke halaman utama
        exit;
    } else {
        // NISN tidak ditemukan, tampilkan pesan error
        $error_message = "Login gagal! NISN tidak terdaftar.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* CSS untuk pesan error */
        .error-message {
            color: red;
            font-weight: bold;
            font-size: 16px;
            padding: 10px;
            background-color: #fce4e4;
            border: 1px solid red;
            margin-top: 20px;
            text-align: center;
        }

        .login-container {
            text-align: center;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        .login-box {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-box button:hover {
            background-color: #45a049;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Sign In</h2>
        
        <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <div class="login-box">
            <form method="POST" action="">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
                
                <label for="nisn">NISN</label>
                <input type="password" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                
                <button type="submit" class="btn login-btn">Login</button>
            </form>
        </div>
    </div>

    <footer>
        <p>Made With Kelompok 4 | © 2025</p>
    </footer>

</body>
</html>

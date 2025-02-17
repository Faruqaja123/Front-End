<?php
// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Konfigurasi koneksi database
$servername = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "tspkl2025";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pastikan data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama                 = $_POST['nama'] ?? '';
    $alamat               = $_POST['alamat'] ?? '';
    $email                = $_POST['email'] ?? '';
    $angkatan             = $_POST['angkatan'] ?? '';
    $nisn                 = $_POST['nisn'] ?? '';
    $jenis_kelamin        = $_POST['jenis_kelamin'] ?? '';
    $nomor_hp             = $_POST['nomor_hp'] ?? '';
    $kompetensi_keahlian  = $_POST['kompetensi_keahlian'] ?? '';
    
    $nama_universitas         = $_POST['nama_universitas'] ?? '';
    $alamat_universitas       = $_POST['alamat_universitas'] ?? '';
    $fakultas                 = $_POST['fakultas'] ?? '';
    $Semester                 = $_POST['Semester'] ?? '';
    $TahunMasukUniversitas    = $_POST['TahunMasukUniversitas'] ?? '';

    // Siapkan query SQL dengan prepared statement
    $sql = "INSERT INTO kuliah 
            (nama, alamat, email, angkatan, nisn, jenis_kelamin, nomor_hp, kompetensi_keahlian, nama_universitas, alamat_universitas, fakultas, Semester, TahunMasukUniversitas)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare gagal: " . $conn->error);
    }

    // Bind parameter
    $stmt->bind_param(
        "sssssssssssss",
        $nama,
        $alamat,
        $email,
        $angkatan,
        $nisn,
        $jenis_kelamin,
        $nomor_hp,
        $kompetensi_keahlian,
        $nama_universitas,
        $alamat_universitas,
        $fakultas,
        $Semester,
        $TahunMasukUniversitas
    );

    // Eksekusi statement
    if ($stmt->execute()) {
        header("Location: data-alumni.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Menampilkan data alumni dari database
$query = "SELECT * FROM kuliah";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .buttons a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            background-color: red;
            border-radius: 5px;
        }
        .buttons a.edit {
            background-color: green;
        }
    </style>
</head>
<body>

<h2>Data Alumni</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Angkatan</th>
        <th>NISN</th>
        <th>Jenis Kelamin</th>
        <th>Nomor HP</th>
        <th>Kompetensi Keahlian</th>
        <th>Nama Universitas</th>
        <th>Alamat Universitas</th>
        <th>Fakultas</th>
        <th>Semester</th>
        <th>Tahun Masuk</th>
        <th>Aksi</th>
    </tr>

    <?php
    while ($arr_siswa = mysqli_fetch_array($hasil)) {
        echo "<tr>
            <td>{$arr_siswa['id']}</td>
            <td>{$arr_siswa['nama']}</td>
            <td>{$arr_siswa['alamat']}</td>
            <td>{$arr_siswa['email']}</td>
            <td>{$arr_siswa['angkatan']}</td>
            <td>{$arr_siswa['nisn']}</td>
            <td>{$arr_siswa['jenis_kelamin']}</td>
            <td>{$arr_siswa['nomor_hp']}</td>
            <td>{$arr_siswa['kompetensi_keahlian']}</td>
            <td>{$arr_siswa['nama_universitas']}</td>
            <td>{$arr_siswa['alamat_universitas']}</td>
            <td>{$arr_siswa['fakultas']}</td>
            <td>{$arr_siswa['Semester']}</td>
            <td>{$arr_siswa['TahunMasukUniversitas']}</td>
            <td class='buttons'>
                <a class='edit' href='edit.php?id={$arr_siswa['id']}'>Edit</a> | 
                <a href='delete.php?id={$arr_siswa['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
            </td>
        </tr>";
    }
    ?>

</table>

</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>

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

    // Ambil data dari form (sesuaikan dengan name attribute pada form Anda)
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

    // Bind parameter dengan tipe data string (total 13 parameter)
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
    exit;  // Pastikan exit() dipanggil agar tidak ada kode lain yang dieksekusi
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

// Tutup statement
$stmt->close();

}

// Tutup koneksi
$conn->close();
?>

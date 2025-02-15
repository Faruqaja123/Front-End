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
    $nama                = $_POST['nama'] ?? '';
    $alamat              = $_POST['alamat'] ?? '';
    $email               = $_POST['email'] ?? '';
    $angkatan            = $_POST['angkatan'] ?? '';
    $nisn                = $_POST['nisn'] ?? '';
    $jenis_kelamin       = $_POST['jenis_kelamin'] ?? '';
    $nomor_hp            = $_POST['nomor_hp'] ?? '';
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'] ?? '';
    
    $nama_perusahaan     = $_POST['nama_perusahaan'] ?? '';
    $alamat_perusahaan   = $_POST['alamat_perusahaan'] ?? '';
    $nomor_perusahaan    = $_POST['nomor_perusahaan'] ?? '';
    $sektor_perusahaan   = $_POST['sektor_perusahaan'] ?? '';
    $tahun_masuk_kerja   = $_POST['tahun_masuk_kerja'] ?? '';

    // Siapkan query SQL dengan prepared statement
    // Pastikan tabel 'bekerja' memiliki kolom-kolom berikut:
    $sql = "INSERT INTO bekerja 
            (nama, alamat, email, angkatan, nisn, jenis_kelamin, nomor_hp, kompetensi_keahlian, 
             nama_perusahaan, alamat_perusahaan, nomor_perusahaan, sektor_perusahaan, tahun_masuk_kerja)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare gagal: " . $conn->error);
    }

    // Bind parameter (13 parameter, semua string)
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
        $nama_perusahaan,
        $alamat_perusahaan,
        $nomor_perusahaan,
        $sektor_perusahaan,
        $tahun_masuk_kerja
    );

    // Eksekusi statement dan redirect jika berhasil
    if ($stmt->execute()) {
        header("Location: data-alumni.php");
        exit;  // Pastikan tidak ada output setelah header redirect
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>

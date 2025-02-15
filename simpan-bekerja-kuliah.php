<?php
// Kode PHP untuk menyambungkan ke database
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

// Mengecek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $angkatan = $_POST['angkatan'];
    $kompetensi = $_POST['kompetensi'];
    $nama_universitas = $_POST['nama_universitas'];
    $alamat_universitas = $_POST['alamat_universitas'];
    $fakultas = $_POST['fakultas'];
    $semester = $_POST['semester'];
    $tahun_masuk_kuliah = $_POST['tahun_masuk_kuliah'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $nomor_perusahaan = $_POST['nomor_perusahaan'];
    $sektor_perusahaan = $_POST['sektor_perusahaan'];
    $tahun_masuk_kerja = $_POST['tahun_masuk_kerja'];

    // Query untuk menyimpan data ke dalam database
    $sql = "INSERT INTO alumni (nama, nisn, alamat, jenis_kelamin, email, no_hp, angkatan, kompetensi, nama_universitas, alamat_universitas, fakultas, semester, tahun_masuk_kuliah, nama_perusahaan, alamat_perusahaan, nomor_perusahaan, sektor_perusahaan, tahun_masuk_kerja) 
            VALUES ('$nama', '$nisn', '$alamat', '$jenis_kelamin', '$email', '$no_hp', '$angkatan', '$kompetensi', '$nama_universitas', '$alamat_universitas', '$fakultas', '$semester', '$tahun_masuk_kuliah', '$nama_perusahaan', '$alamat_perusahaan', '$nomor_perusahaan', '$sektor_perusahaan', '$tahun_masuk_kerja')";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        header("Location: data-alumni.php"); // Arahkan ke halaman data-alumni.php setelah sukses
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

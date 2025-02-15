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
    $nomor_hp            = !empty($_POST['nomor_hp']) ? $_POST['nomor_hp'] : NULL; // Pastikan tidak string kosong
    $kompetensi_keahlian = $_POST['kompetensi'] ?? '';

    // Data Usaha
    $Nama_Usaha          = $_POST['Nama_Usaha'] ?? ''; 
    $Alamat_usaha        = $_POST['Alamat_usaha'] ?? ''; 
    $No_Telpon_Usaha     = $_POST['No_Telpon_Usaha'] ?? ''; 
    $Bidang_Usaha        = $_POST['Bidang_Usaha'] ?? ''; 
    $Jumlah_Karyawan        = $_POST['Jumlah_Karyawan'] ?? ''; 
// Ambil data dengan validasi
$Tahun_BerdiriUsaha = !empty($_POST['Tahun_BerdiriUsaha']) ? $_POST['Tahun_BerdiriUsaha'] : NULL;


// Query SQL
$sql = "INSERT INTO wirausaha 
        (nama, alamat, email, angkatan, nisn, jenis_kelamin, nomor_hp, kompetensi_keahlian, 
         Nama_Usaha, Alamat_usaha, No_Telpon_Usaha, Bidang_Usaha, Jumlah_Karyawan, Tahun_BerdiriUsaha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Persiapkan statement
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare gagal: " . $conn->error);
}

// Bind parameter
$stmt->bind_param(
    "ssssssisssssss",
    $nama,
    $alamat,
    $email,
    $angkatan,
    $nisn,
    $jenis_kelamin,
    $nomor_hp,
    $kompetensi_keahlian,
    $Nama_Usaha,
    $Alamat_usaha,
    $No_Telpon_Usaha,
    $Bidang_Usaha,
    $Jumlah_Karyawan,
    $Tahun_BerdiriUsaha
);

// Eksekusi statement
if ($stmt->execute()) {
    header("Location: data-alumni.php");
    exit;
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

// Tutup statement
$stmt->close();

}

// Tutup koneksi
$conn->close();
?>

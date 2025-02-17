<!DOCTYPE html>
<html>
<body>

<?php
// Tampilkan tabel dengan border
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Nama</th><th>Alamat</th><th>Email</th><th>Angkatan</th><th>NISN</th><th>Jenis Kelamin</th><th>Nomor HP</th><th>Kompetensi Keahlian</th><th>Nama Perusahaan</th><th>Alamat Perusahaan</th><th>Nomor Perusahaan</th><th>Sektor Perusahaan</th><th>Tahun Masuk Kerja</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    public function current(): mixed {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current() . "</td>";
    }

    public function beginChildren(): void {
        echo "<tr>";
    }

    public function endChildren(): void {
        echo "</tr>\n";
    }
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tspkl2025";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Pastikan kolom angkatan benar-benar berisi angka
    $stmt = $conn->prepare("SELECT nama, alamat, email, angkatan, nisn, jenis_kelamin, nomor_hp, kompetensi_keahlian, nama_perusahaan, alamat_perusahaan, nomor_perusahaan, sektor_perusahaan, tahun_masuk_kerja FROM bekerja WHERE angkatan = :angkatan");
    $angkatan = 1; // Ambil hanya angkatan 1
    $stmt->bindParam(':angkatan', $angkatan, PDO::PARAM_INT);
    $stmt->execute();

    // set hasil ke mode asosiatif
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
        echo $v;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

echo "</table>";
?>

</body>
</html>

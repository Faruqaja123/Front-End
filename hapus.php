<?php
include "data-alumni.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "DELETE FROM data-alumni WHERE id = '$id'";
    $result = mysqli_query($koneksi,$query);
    if(mysqli_affected_rows($koneksi)>0){
        echo "Berhasil menghapus data-alumni";
        echo "<meta http-equiv='refresh' content='1, url=index.php'>";
    }else{
        echo "Gagal menghapus data-alumni";
        echo "<meta http-equiv='refresh' content='1, url=hapus.php'>";
    }
}else{
    ?>

<fieldset style="width:20%">
    <legend>Hapus Siswa</legend>
    <form action="">
        <input type="number" name="id" id="id" required>
        <input type="submit" value="Hapus">
    </form>
</fieldset>

<?php
}
?>
<?php
    include "koneksi.php";
    $articleID = $_GET['articleID'];
    $perintah="DELETE FROM articles WHERE id =\"$articleID\"";
    $hasil= mysqli_query($connection, $perintah);
    if ($hasil) {
        echo "Artikel berhasil dihapus<br>";
        echo "<a href=\"tampil_articles.php\">Back</a>";
    } else {
        echo "Komentar gagal dihapus. Kemungkinan terjadi kegagalan koneksi ke database MySQL.";

    }
?>
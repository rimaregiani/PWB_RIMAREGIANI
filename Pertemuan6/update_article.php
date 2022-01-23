<?php
    include "koneksi.php";
    $judul      = $_POST['title'];
    $penulis    = $_POST['author'];
    $lead       = $_POST['abstraksi'];
    $isi        = $_POST['content'];
    $time       = date("Y-m-d H:i:s");    
    $lead       = str_replace("\r\n","<br>",$lead);
    $content    = str_replace("\r\n","<br>",$isi);
    $articleID  = $_POST['ID'];
   
    $update="UPDATE articles SET judul='$judul', 
                                penulis='$penulis',
                                lead='$lead',
                                content='$content', 
                                waktu='$time' 
                        WHERE id ='$articleID'";
    // echo $update;
    $hasil=mysqli_query($connection,$update);

    if ($hasil) {
        echo "Artikel berhasil di update<br>";
        echo "<a href=\"tampil_articles.php\">List</a>";
    } else {
        echo "Artikel gagal di update";
    }
?>
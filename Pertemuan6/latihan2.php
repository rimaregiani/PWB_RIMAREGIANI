<?
    mysqli_connect("localhost","root","");
    $dbname="lat_dbase";
    $cek=mysqli_query("CREATE DATABASE $dbname") or die("Gagal membuat
    database: $dbname");
    if($cek){
    echo "Database $dbname berhasil dibuat";
    }
?>
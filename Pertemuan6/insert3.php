<?php
    $con = mysqli_connect("localhost","root","", "lat_dbase");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error());
    }
    $sql="INSERT INTO tbl_mhs (FirstName, LastName, Age)
    VALUES
    ('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";
    if (!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error());
    }
    echo "1 record added";
    mysqli_close($con)
?>
<?php
    $con = mysqli_connect("localhost","root","", "lat_dbase");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_query($con, "UPDATE tbl_mhs SET Age = '36'
    WHERE FirstName = 'Karina' AND LastName = 'Suwandi'");
    mysqli_close($con);
?>
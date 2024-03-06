<?php
    $servername = "localhost";
    $username = "adminroot";
    $password = "12345678";
    $dbname = "databasesell";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_POST["user_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username_em = $_POST["username"];
    $id_crad_Passport = $_POST["id_crad_Passport"];
    $car_license = $_POST["car_license"];
    $rentedcar = $_POST["rentedcar"];
    $start_Renting = $_POST["start_Renting"];
    $end_renting = $_POST["end_renting"];
    $employess = $_POST["employess"];


    $sql = "UPDATE customer SET f_name='$fname',l_name='$lname',username='$username_em',id_crad_Passport='$id_crad_Passport',rentedcar='$rentedcar',car_license='$car_license',start_Renting='$start_Renting',end_renting='$end_renting',employess='$employess' WHERE user_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location:http://localhost/adminconfig/config.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
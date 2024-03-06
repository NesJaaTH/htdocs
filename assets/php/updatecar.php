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
    $id = $_POST["ID"];
    $fname = $_POST["cb"];
    $lname = $_POST["cm"];
    $username_em = $_POST["bs"];
    $id_crad_Passport = $_POST["cc"];
    $car_license = $_POST["cr"];
    $rentedcar = $_POST["rs"];
    $start_Renting = $_POST["cre"];
    $end_renting = $_POST["p"];


    $sql = "UPDATE car_models SET car_brand='$fname',carmodel='$lname',car_motorbike='$username_em',color_car='$id_crad_Passport',car_registration='$car_license',rental_status='$rentedcar',car_renter='$start_Renting',pirce='$end_renting' WHERE car_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location:http://localhost/adminconfig/carlist.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
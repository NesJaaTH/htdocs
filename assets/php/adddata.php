<?php
    include 'connect.php';

    session_start();
    ob_start();

    if ($_SESSION['access_rights'] === "Admin"){
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $car_brand = $_POST["car_brand"];
        $car_model = $_POST["car_model"];
        $body_style = $_POST["body_style"];
        $car_color = $_POST["car_color"];
        $car_registration = $_POST["car_registration"];
        $pirce = $_POST["pirce"];

        $sql = "INSERT INTO car_models (car_brand, carmodel, car_motorbike,color_car,car_registration,pirce)
                                VALUES ('$car_brand', '$car_model', '$body_style', '$car_color', '$car_registration', '$pirce');";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location:http://localhost/adminconfig/carlist.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
        echo "OK";
    }else{
        header('location:http://localhost/indexshop.php');
    }
        
?>
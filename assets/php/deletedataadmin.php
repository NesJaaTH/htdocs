<?php
    $servername = "localhost";
    $username = "adminroot";
    $password = "12345678";
    $dbname = "databasesell";

    session_start();
    ob_start();
    if ($_SESSION['access_rights'] === "Admin"){
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_GET['page'];

        $sql = "DELETE FROM employee WHERE employee_id='$id';";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location:http://localhost/adminconfig/Admin.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }else{
        header('location:http://localhost/indexshop.php');
    }
?>
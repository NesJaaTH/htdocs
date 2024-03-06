<?php
    include 'connect.php';

    session_start();
    ob_start();

    if ($_SESSION['access_rights'] === "Admin"){
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        session_destroy();
        header('location:http://localhost');
        $conn->close();
        die();
    }else{
        session_destroy();
        header('location:http://localhost');
        $conn->close();
        die();
    }

?>
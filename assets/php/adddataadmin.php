<?php
    include 'connect.php';

    session_start();
    ob_start();

    if ($_SESSION['access_rights'] === "Admin"){
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $password_user = $_POST["password_user"];
        $id_card = $_POST["id_card"];
        $salay = $_POST["salay"];
        $age = $_POST["age"];
        $ar = strtoupper($_POST["ar"]);

        $passwordHash = password_hash( $password_user, PASSWORD_BCRYPT, [ 'cost' => 10 ] );

        if ($ar === "ADMIN") {
            $ar = "A";
        }elseif ($ar === "STAFF"){
            $ar = "S";
        }

        $sql = "INSERT INTO employee (f_name, l_name,ID_card,emp_password,salary,age,access_rights)
                VALUES ('$f_name', '$l_name', '$id_card', '$passwordHash', '$salay', '$age','$ar');";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('location:http://localhost/adminconfig/Admin.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
        echo "OK";
    }else{
        session_destroy();
        header('location:http://localhost/indexshop.php');
    }
        
?>
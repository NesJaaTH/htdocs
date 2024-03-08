<?php
    $servername = "localhost";
    $username = "adminroot";
    $password = "12345678";
    $dbname = "databasesell";

    session_start();
    ob_start();
    if ($_SESSION['access_rights'] === "Member" || $_SESSION['access_rights'] === "Admin" || $_SESSION['access_rights'] === "Staff"){

        $registration = $_GET['re'];
        $id = $_GET['id'];
        $access = $_GET['access'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($access === "Member"){
            $sql = "UPDATE car_models SET rental_status = 'TRUE', car_renter= '$id' WHERE car_registration = '$registration';";
            if ($conn->query($sql) === TRUE) {
                date_default_timezone_set("Asia/Bangkok");
                $date_start = date('Y-m-d h:i:s');
                $date_end = date('Y-m-d h:i:s' ,strtotime("+1 days"));
                $sql_user = "UPDATE customer SET rentedcar= '$registration' ,start_renting = '$date_start',  end_renting = '$date_end' WHERE user_id = '$id';";
                echo $date_start;
                if ($conn->query($sql_user)){
                    header('location:http://localhost/user/userindex.php');
                }               
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        } elseif($access === "Staff" || $access === "Admin"){

            $sql = "UPDATE car_models SET rental_status = 'TRUE', car_renter= '$id' WHERE car_registration = '$registration';";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                header('location:http://localhost/adminconfig/config.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        }

        
    }else{
        session_destroy();
        header('location:http://localhost/indexshop.php');
    }
?>
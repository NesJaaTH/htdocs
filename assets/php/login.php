<?php
$servername = "localhost";
$username = "adminroot";
$password = "12345678";
$dbname = "databasesell";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username_login = $_POST["username"];
    $password_login = $_POST["password"];

    $sql = "SELECT username,user_password,access_rights FROM customer WHERE username='$username_login'";
    $check = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($check);
        $username_db = $result['username'];
        $password_db = $result['user_password'];
        $access_rights = $result['access_rights'];
    if(mysqli_num_rows($check)>0){
        if(password_verify($password_login, $password_db)){
            if($access_rights === "A"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Admin');
                $_SESSION['user_name']=($username_db);
                header('location:http://localhost/adminconfig/config.php');
                die;
            } elseif ($access_rights === "M"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Member');
                $_SESSION['user_name']=($username_db);
                header('location:http://localhost/user/userindex.php');
                die;
            }else{
                session_start();
                ob_start();
                session_destroy();
                header('location:http://localhost');
                die;
            }
        }else{
            echo"Password Incorrect";
        }
    }
    mysqli_close( $conn );
?>
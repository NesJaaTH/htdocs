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

    $sql = "SELECT user_id,username,user_password,access_rights FROM customer WHERE username='$username_login'";
    $check = mysqli_query($conn,$sql);
        $result = mysqli_fetch_assoc($check);
        $username_db = $result['username'];
        $password_db = $result['user_password'];
        $id_db = $result['user_id'];
        $access_rights = $result['access_rights'];
    if(mysqli_num_rows($check)>0){
        if(password_verify($password_login, $password_db)){
            if($access_rights === "A"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Admin');
                $_SESSION['user_name']=($username_db);
                $_SESSION['db_id']=($id_db);
                header('location:http://localhost/adminconfig/config.php');
                die;
            } elseif ($access_rights === "M"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Member');
                $_SESSION['user_name']=($username_db);
                $_SESSION['db_id']=($id_db);
                header('location:http://localhost/user/userindex.php');
                die;
            }elseif ($access_rights === "S"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Staff');
                $_SESSION['user_name']=($username_db);
                $_SESSION['db_id']=($id_db);
                header('location:http://localhost/adminconfig/config.php');
                die;
            }else{
                session_start();
                ob_start();
                session_destroy();
                header('location:http://localhost/indexshop.php');
                die;
            }
        }else{
            session_start();
            ob_start();
            $_SESSION['Incorrect']=('Incorrect');
            header('location:http://localhost/signupandlogin/login.php');
            die;
        }
    }

    $sql_admin = "SELECT employee_id,f_name,emp_password,access_rights FROM employee WHERE f_name='$username_login'";
    $check_admin = mysqli_query($conn,$sql_admin);
        $result_admin = mysqli_fetch_assoc($check_admin);
        $username_db_admin = $result_admin['f_name'];
        $password_db_admin = $result_admin['emp_password'];
        $id_db_admin = $result_admin['employee_id'];
        $access_rights_admin = $result_admin['access_rights'];
    if(mysqli_num_rows($check_admin)>0){
        if(password_verify($password_login, $password_db_admin)){
            if($access_rights_admin === "A"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Admin');
                $_SESSION['user_name']=($username_db_admin);
                $_SESSION['db_id']=($id_db_admin);
                header('location:http://localhost/adminconfig/config.php');
                die;
            } elseif ($access_rights_admin === "M"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Member');
                $_SESSION['user_name']=($username_db_admin);
                $_SESSION['db_id']=($id_db_admin);
                header('location:http://localhost/user/userindex.php');
                die;
            }elseif ($access_rights_admin === "S"){
                session_start();
                ob_start();
                $_SESSION['access_rights']=('Staff');
                $_SESSION['user_name']=($username_db_admin);
                $_SESSION['db_id']=($id_db_admin);
                header('location:http://localhost/adminconfig/config.php');
                die;
            }else{
                session_start();
                ob_start();
                session_destroy();
                header('location:http://localhost/indexshop.php');
                die;
            }
        }else{
            session_start();
            ob_start();
            $_SESSION['Incorrect']=('Incorrect');
            header('location:http://localhost/signupandlogin/login.php');
            die;
        }
        mysqli_close( $conn );
    }else{
        session_start();
        ob_start();
        $_SESSION['Incorrect']=('Incorrect');
        header('location:http://localhost/signupandlogin/login.php');
        die;
    }
?>
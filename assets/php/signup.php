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

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $username_em = $_POST["username"];
  $password_user = $_POST["password"];
  $idcradorPassport = $_POST["idcradorPassport"];
  $idcrad_Passport = $_POST["idcrad_Passport"];
  $car_license = $_POST["car_license"];

  $passwordHash = password_hash( $password_user, PASSWORD_BCRYPT, [ 'cost' => 10 ] );

  $sql = "INSERT INTO customer (f_name, l_name, id_cradandpassport, id_cradorpassport, user_password,username,car_license) 
          VALUES ('$fname', '$lname','$idcrad_Passport','$idcradorPassport','$passwordHash','$username_em','$car_license');";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header('location:http://localhost/signupandlogin/login.php');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
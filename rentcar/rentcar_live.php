<?php
    include("/xampp/htdocs/assets/php/connect.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['rentcar'])){
        $input = $_POST['rentcar'];
        $query = "SELECT * FROM car_models WHERE car_brand='$input' AND rental_status = 'FALSE';";

        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){?> 

            <?php
                while ($row = mysqli_fetch_assoc($result)){
                    $myObj[] = $row;
                }
                echo json_encode($myObj);


            ?>
            
            <?php
        }else{
            echo "<h6 style='color: #ffff;'>No data Found</h6><br><br><br><br><br>";
        }
    }
?>
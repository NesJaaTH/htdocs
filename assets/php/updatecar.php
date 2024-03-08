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

    $statusMsg = '';  
    $targetDir = "/xampp/htdocs/assets/images/uploads/"; 
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName; 
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg','gif'); 

    if(!empty($_FILES["file"]["name"])){ 
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
        
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database 
                $insert = $conn->query("UPDATE car_models SET car_img = '".$fileName."' WHERE car_id='$id'"); 
                if($insert){ 
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully."; 
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 


    $sql = "UPDATE car_models SET car_brand='$fname',carmodel='$lname',car_motorbike='$username_em',color_car='$id_crad_Passport',car_registration='$car_license',rental_status='$rentedcar',car_renter='$start_Renting',pirce='$end_renting' WHERE car_id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location:http://localhost/adminconfig/carlist.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
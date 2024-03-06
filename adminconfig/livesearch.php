<?php
    include("/xampp/htdocs/assets/php/connect.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['input'])){
        $input = $_POST['input'];

        $query = "SELECT * FROM customer WHERE f_name LIKE '{$input}%' OR l_name LIKE '{$input}%' OR username LIKE '{$input}%' OR id_cradandpassport LIKE '{$input}%'";

        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){?> 
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="th-css">ID</th>
                        <th scope="col" class="th-css">name</th>
                        <th scope="col" class="th-css">username</th>
                        <th scope="col" class="th-css">ID CRAD and PASSPORT</th>
                        <th scope="col" class="th-css">CAR LICENSE</th>
                        <th scope="col" class="th-css">RENTEDCAR</th>
                        <th scope="col" class="th-css">START RENTING</th>
                        <th scope="col" class="th-css">END RENTING</th>
                        <th scope="col" class="th-css">EMPLOYEES</th>
                        <th scope="col" class="th-css">Action</th>
                    </tr>
                    <tbody class="tbody">
                        <?php 
                            while ($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td scope="row"><?=$row['user_id'] ?></td>
                                    <td scope="row"><?=$row['f_name'] ?> <?=$row['l_name']?></td>
                                    <td scope="row"><?=$row['username'] ?></td>
                                    <td scope="row"><?=$row['id_cradandpassport'] ?></td>
                                    <td scope="row"><?=$row['car_license'] ?></td>
                                    <td scope="row"><?=$row['rentedcar'] ?></td>
                                    <td scope="row"><?=$row['start_renting'] ?></td>
                                    <td scope="row"><?=$row['end_renting'] ?></td>
                                    <td scope="row"><?=$row['employees'] ?></td>
                                    <td scope="row" class="id-<?=$row['user_id']?>"><i class="fa-regular fa-pen-to-square" style="cursor: pointer;" onclick="onedit('<?=$row['user_id']?>','<?=$row['f_name'] ?>','<?=$row['l_name']?>','<?=$row['username'] ?>','<?=$row['id_cradandpassport'] ?>','<?=$row['car_license'] ?>','<?=$row['rentedcar'] ?>','<?=$row['start_renting'] ?>','<?=$row['end_renting'] ?>','<?=$row['employees'] ?>')"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-trash" style="cursor: pointer;" onclick="deletedata('<?=$row['user_id']?>')"></i></td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </thead>

            </table>
    
            <?php
        }else{
            echo "<h6 style='color: #ffff;'>No data Found</h6><br><br><br><br><br>";
        }
    } elseif(isset($_POST['inputcar'])){
        $input = $_POST['inputcar'];

        $query = "SELECT * FROM car_models WHERE car_brand LIKE '{$input}%' OR carmodel LIKE '{$input}%' OR car_motorbike LIKE '{$input}%' OR color_car LIKE '{$input}%' 
                                OR car_registration LIKE '{$input}%' OR rental_status LIKE '{$input}%' OR car_renter LIKE '{$input}%' OR pirce LIKE '{$input}%'";

        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){?> 
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="th-css">ID</th>
                        <th scope="col" class="th-css">Car Brand</th>
                        <th scope="col" class="th-css">Car Model</th>
                        <th scope="col" class="th-css">Body Style</th>
                        <th scope="col" class="th-css">Car Color</th>
                        <th scope="col" class="th-css">Car Registration</th>
                        <th scope="col" class="th-css">Rental Status</th>
                        <th scope="col" class="th-css">Car Renter</th>
                        <th scope="col" class="th-css">Pirce</th>
                        <th scope="col" class="th-css">Action</th>
                    </tr>
                    <tbody class="tbody">
                        <?php 
                            while ($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td scope="row"><?=$row['car_id'] ?></td>
                                    <td scope="row"><?=$row['car_brand'] ?></td>
                                    <td scope="row"><?=$row['carmodel'] ?></td>
                                    <td scope="row"><?=$row['car_motorbike'] ?></td>
                                    <td scope="row"><?=$row['color_car'] ?></td>
                                    <td scope="row"><?=$row['car_registration'] ?></td>
                                    <td scope="row"><?=$row['rental_status'] ?></td>
                                    <td scope="row"><?=$row['car_renter'] ?></td>
                                    <td scope="row"><?=$row['pirce'] ?></td>
                                    <td scope="row" class="id-<?=$row['car_id']?>"><i class="fa-regular fa-pen-to-square" style="cursor: pointer;" onclick="onedit('<?=$row['car_id'] ?>','<?=$row['car_brand'] ?>','<?=$row['carmodel'] ?>','<?=$row['car_motorbike'] ?>','<?=$row['color_car'] ?>','<?=$row['car_registration'] ?>','<?=$row['rental_status'] ?>','<?=$row['car_renter'] ?>','<?=$row['pirce'] ?>')"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-trash" style="cursor: pointer;" onclick="deletedata()"></i></td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </thead>

            </table>
    
            <?php
        }else{
            echo "<h6 style='color: #ffff;'>No data Found</h6><br><br><br><br><br>";
        }
    }
?>
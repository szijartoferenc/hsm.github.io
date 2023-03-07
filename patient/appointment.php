<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Időpontfoglalás</title>
</head>

<body>
    <?php

    include("../include/header.php");
    include("../include/connection.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php

                    include("navside.php");
                    
                    ?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center my-2">Időpontfoglalás</h5>

                    <?php 
                    
                    $pat = $_SESSION['patient'];
                    $sel = mysqli_query($conn, "SELECT * FROM patients WHERE username='$pat'");

                    $row = mysqli_fetch_array($sel);

                    $surname = $row['surname'];
                    $firstname = $row['firstname'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $phone = $row['phone'];

                    if (isset($_POST['book'])) {
                        $date = $_POST['date'];
                        $sym= $_POST['sym'];


                        if (empty($sym)) {
                            
                        }else {
                            $query = "INSERT INTO appointment(surname,firstname,gender,email,phone,appointment_date,symptoms,status,date_booked) VALUES('$surname','$firstname','$gender','$email','$phone','$date','$sym','Pending',NOW())";
                           
                            $result = mysqli_query($conn,$query);

                            if ($result) {
                                echo "<script>alert('Lefoglalta az időpontot')</script>";
                            }

                            
                        } 

                    }
                 
                    
                    ?>

                <div class="col-md-12">
                 <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 mt-4 p-5 bg-light text-dark rounded">
                        <form method="post">
                            <label>Foglalás időpontja</label>
                            <input type="date" name="date" class="form-control">

                            <label>Beteg tünetei</label>
                            <input type="text" name="sym" class="form-control"
                            autocomplete="off" placeholder="Írja be a tüneteit">

                            <input type="submit" name="book" class="btn btn-info my-2" value="Időpont foglalása">
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                 </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orvosi kezelőfelület</title>
</head>
<body>

   <?php 
   include("../include/header.php")
   
   
   ?>

   <div class="container-fluid">
    <div class="col-md-12">
    <div class="row">
    <div class="col-md-2" style="margin-left: -30px;">
            <?php 
            
            include("navside.php");
            include("../include/connection.php");
            
            ?>
    </div>
    <div class="col-md-10">

    <h4 class="my-5">Orvosi felület</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                                                       
                            <!---Orvosi profil rész kialakítása--->
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        
                                            <h5 class="my-2 text-white" style="font-size:30px"></h5>
                                            <h5 class="text-white">Orvosi profil</h5>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.php"><i class="fas fa-user-doctor fa-3x my-4" style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!---Beteg rész kialakítása--->
                            <div class="col-md-3 bg-danger mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                             $patient = mysqli_query($conn, "SELECT * FROM patients");

                                             $num = mysqli_num_rows($patient);
 
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Beteg</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="patient.php"><i class="fas fa-bed-pulse fa-3x my-4" style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!---Időpont rész kialakítása--->
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                             $appointment = mysqli_query($conn, "SELECT * FROM appointment WHERE status='Pending'");

                                             $num1 = mysqli_num_rows($appointment);
 
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num1; ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Időpont</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="appointment.php"><i class="fa-sharp fa-solid fa-calendar-check fa-3x my-4" style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>


                            </div>
                                                 

                             


                            </div>



                        </div>

    </div>
    </div>
    </div>


   </div>
  
    
</body>
</html>
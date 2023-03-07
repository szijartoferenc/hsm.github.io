<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin felület</title>
</head>

<body>

    <?php

    include("../include/header.php");

    include("../include/connection.php")
    ?>
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="row">

                <div class="col-md-2" style="margin-left: -30px;">

                    <?php
                    include("navside.php");
                    ?>

                </div>
                <!---Admin felület kialakítása--->
                <div class="col-md-10">
                    <h4 class="my-5">Admin felület</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <!---Admin rész kialakítása--->
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!--adatbázis rész kialakítása--->
                                        <div class="col-md-8">
                                            <?php
                                            $adm = mysqli_query($conn,"SELECT * FROM admin");

                                            $num = mysqli_num_rows($adm);
                                            ?>
                                            <!--adatbázis rész vége--->
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="admin.php"><i class="fas fa-user-cog fa-3x my-4" style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!---Orvos rész kialakítása--->
                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                            
                                            $doctor = mysqli_query($conn, "SELECT * FROM doctors WHERE status='Approved'");

                                            $num2 = mysqli_num_rows($doctor);

                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num2 ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Orvos</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="../admin/doctor.php"><i class="fas fa-user-doctor fa-3x my-4" style="color:white" ;></i></a>
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

                                             $num3 = mysqli_num_rows($patient);
 
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num3 ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Beteg</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="patient.php"><i class="fas fa-bed-pulse fa-3x my-4" style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!---Jelentés rész kialakítása--->
                            <div class="col-md-3 bg-secondary mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <?php 
                                             $report = mysqli_query($conn, "SELECT * FROM report");

                                             $num4 = mysqli_num_rows($report);
 
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num4 ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Jelentés</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="report.php"><i class="fa-regular fa-file-lines fa-3x my-4" style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <!-- Bevétel felület kialakítása--->
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                          <?php 

                                          $in = mysqli_query($conn, "SELECT sum(amount_paid)as profit FROM income");

                                             $row = mysqli_fetch_array($in);
                                             $inc = $row['profit'];
                                          ?>
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo "Ft$inc" ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Bevétel</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="income.php"><i class="fa-solid fa-file-invoice-dollar fa-3x my-4" style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <!---Állásra jelentkezett felület kialakítása--->
                            <div class="col-md-3 bg-primary mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                            
                                            $job = mysqli_query($conn, "SELECT * FROM doctors WHERE status='Pending'");

                                            $num1 = mysqli_num_rows($job);

                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num1 ?></h5>
                                            <h5 class="text-white">Összes</h5>
                                            <h5 class="text-white">Jelentkező</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="../admin/job_request.php"><i class="fa-sharp fa-solid fa-user-tie fa-3x my-4" style="color:white" ;></i></a>
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
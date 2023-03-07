<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beteg kezelőfelület</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include ("../include/connection.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">

            <div class="row">

                <div class="col-md-2" style="margin-left: -30px;">

                    <?php
                    include("navside.php");
                    include ("../include/connection.php");
                    ?>

                </div>
                <!---Beteg felület kialakítása--->
                <div class="col-md-10">
                    <h4 class="my-5">Beteg felület</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">

                            <!---Betegprofil rész kialakítása--->
                            <div class="col-md-3 bg-secondary mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            
                                            <h5 class="my-2 text-white" style="font-size:30px"></h5>
                                            <h5 class="text-white">Profilom</h5>

                                        </div>
                                        <div class="col-md-4">
                                            <a href="profile.php"><i class="fa-solid fa-hospital-user fa-3x my-4"
                                                    style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!---Időpont rész kialakítása--->
                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size:30px"></h5>
                                            <h5 class="text-white">Időpontfoglalás</h5>

                                        </div>
                                        <div class="col-md-4">
                                            <a href="appointment.php"><i class="fa-sharp fa-solid fa-calendar-check fa-3x my-4"
                                                    style="color:white" ;></i></i></a>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- Számla felület kialakítása--->
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white" style="font-size:30px">0</h5>
                                            <h5 class="text-white"></h5>
                                            <h5 class="text-white">Számlák</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="invoice.php"><i class="fa-solid fa-file-invoice-dollar fa-3x my-4"
                                                    style="color:white" ;></i></a>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <!---Jelentés rész kialakítása--->
                              <?php 
                              
                              if (isset($_POST['send'])) {
                               
                                    $title = $_POST['send'];
                                    $message = $_POST ['message'];

                                    if (empty($title)) {
                                        
                                    }else if (empty($message)) {

                                    } else {
                                        $user= $_SESSION['patient'];

                                        $query = "INSERT INTO report (title, message,username,date_send) VALUES ('$title', '$message', '$user', NOW())";
                                        

                                        $result = mysqli_query($conn,$query);

                                        if ($result) {
                                            echo "<script>alert('Sikeresen elküldve')</script>";
                                        }
                                    }
                              }
                              
                              ?>


                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 mt-4 p-5 bg-info text-white rounded my-5">
                                        <h5 class="text-center text-white my-2">Jelentés küldése</h5>
                                        <form method="post">
                                            <label>Tárgy</label>
                                            <input type="text" name="title" autocomplete="off" class="form-control my-1"
                                                placeholder="Írja be az üzenet tárgyát">

                                            <label>Üzenet</label>
                                            <input type="text" name="message" autocomplete="off"
                                                class="form-control my-1" placeholder="Írja be az üzenetet">

                                            <input type="submit" name="send" value="send"
                                                class="btn btn-success my-2">
                                        </form>

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
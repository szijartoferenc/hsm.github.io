<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beteg időpontok ellenőrzése</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");


    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("navside.php");
                    ?>

                </div>
                <div class="col-md-10">
                    <h3 class="text-center">Összes időpont</h3>
                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT * FROM appointment WHERE id='$id'";

                        $result = mysqli_query($conn, $query);

                        $row = mysqli_fetch_array($result);
                    }


                    ?>


                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center" colspan="2">
                                            <h3> Időpont részletei </h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">ID: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['id']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Vezetéknév: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['surname']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Keresztnév: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['firstname']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Neme: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['gender']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Email: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['email']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Telefonszám: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['phone']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Foglalt időpont: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['appointment_date']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Tünetei: </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['symptoms']; ?></h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 class="">Foglalás időpontja </h5>
                                        </td>
                                        <td>
                                            <h5 class=""><?php echo $row['date_booked']; ?></h5>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center my-1">Számla</h5>
                                 
                                <?php 
                                
                                if (isset($_POST['send'])) {
                                   $fee = $_POST['fee'];
                                   $des = $_POST['des'];

                                    if (empty($fee)) {
                                        # code...
                                    }else if(empty($des)) {

                                    }else{

                                        $doc = $_SESSION['doctor'];
                                        $sname = $row['surname'];
                                        

                                        $query = "INSERT INTO income(doctor,patient,date_discharge,amount_paid,description) VALUES('$doc','$sname', NOW(),'$fee','$des')";
                                    
                                        $result=mysqli_query($conn,$query);

                                        if($result) {
                                            echo "<script>alert('A számla el lett küldve')</script>";

                                            mysqli_query($conn, "UPDATE appointment SET status='Discharged' WHERE id='$id'");
                                        }
                                    
                                    
                                    }






                                }
                                
                                
                                ?>

                                <form method="post">
                                    <label>Kezelés költsége</label>
                                    <input type="number" name="fee" class="form-control"
                                    autocomplete="off" placeholder="kezelési költság">

                                    <label>Kezelési költség részletezése</label>
                                    <input type="text" name="des" class="form-control"
                                    autocomplete="off" placeholder="kezelés leírása">

                                    <input type="submit" name="send" value="Küldés" class="btn btn-info my-2">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</body>

</html>
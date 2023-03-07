<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beteg számla</title>
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
                    <h5 class="text-center">Számla adatok</h5>

                    <?php

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT * FROM income WHERE id='$id'";

                        $result = mysqli_query($conn, $query);

                        $row = mysqli_fetch_array($result);
                    }


                    ?>

                    <div class="col-mod-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                            
                                <table class="table table-bordered">
                                    <tr>
                                    <th  class="text-center" colspan="2"><h3> Kezelés számla </h3></th>
                                    </tr>
                                    <tr>
                                        <td><h5 class="">Orvos: </h5></td>
                                        <td><h5  class=""><?php echo $row['doctor']; ?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5 class="">Beteg: </h5></td>
                                        <td><h5  class=""><?php echo $row['patient']; ?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5 class="">Teljesítés dátuma: </h5></td>
                                        <td><h5  class=""><?php echo $row['date_discharge']; ?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5 class="">Fizetett összeg: </h5></td>
                                        <td><h5  class=""><?php echo $row['amount_paid']; ?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5 class="">Részletes leírás: </h5></td>
                                        <td><h5  class=""><?php echo $row['description']; ?></h5></td>
                                    </tr>
                                   
                                </table>

                            </div>
                        </div>



                    </div>



                </div>
            </div>
        </div>
    </div>
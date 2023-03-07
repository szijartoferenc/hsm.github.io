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
            <div class="row"></div>
            <div class="col-md-2" style="margin-left: -30px;">

            </div>
            <div class="col-md-10">
                <h5 class="text-center">Számlám</h5>
                <?php

                $pat = $_SESSION['patient'];

                $query = "SELECT * FROM patients WHERE username='$pat'";

                $result = mysqli_query($conn, $query);

                $row = mysqli_fetch_array($result);

                $sname = $row['surname'];

                $querys = mysqli_query($conn, "SELECT * FROM income WHERE patient='$sname'");

                $output = "";



                $output .= "
        
                <table class='table table-bordered'>  
                
                    <tr>
                    <th>ID</th>
                    <th>Orvos</th>
                    <th>Beteg</th>
                    <th>Teljesítés dátuma</th>
                    <th>Fizetett összeg</th>
                    <th>Részletek</th>
                    </tr>       
         
        ";


                if (mysqli_num_rows($querys) < 1) {
                    $output .= "
                    <tr>
                        <td colspan='7' class='text-center'>Nincs több számla</td>
             
                    </tr>
            
                     ";
                }

                while ($row = mysqli_fetch_array($querys)) {
                    $output .= "
                    <tr>
                    <td>"  .$row['id']. "</td>
                    <td>" .$row['doctor']. "</td>
                    <td>" .$row['patient']. "</td>
                     <td>" .$row['date_discharge']. "</td>
                    <td>" .$row['amount_paid']. "</td>
                    <td>" .$row['description']. "</td>
           
                     <td>
                     <a href='check.php?id=" .$row['id']. "'>
            
                    <button class='btn btn-info'>Megtekintés</button>
            
                    </a>
                    </td>
           
        
        ";
                }

                $output .= "
                  </tr>
                 </table>
                 ";

                echo $output;





                ?>




            </div>
        </div>
    </div>
</body>

</html>
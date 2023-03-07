<?php 


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdőoldal</title>
</head>
<body>
<?php 
include("include/header.php");
?>

<div style="margin-top: 50px"></div>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mx-1 shadow">
                <img src="./img/Messagebox_info.png" style="width: 100%; height: 190px;">

                <h5 class="text-center">További információkért kattintson a gombra</h5>

                <a href="#">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">További információ</button>
                </a>
            </div>

            <div class="col-md-4 mx-1 shadow">
                <img src="img/male-patient-bed-hospital.jpg" width="100%">

                <h5 class="text-center">Hozzon létre fiókot, hogy gondoskodhassunk Önről</h5>

                <a href="../hsm/account.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Regisztráció</button>
                </a>
            </div>

            <div class="col-md-4 mx-1 shadow">
                <img src="img/portrait-of-a-happy-young-doctor-in-his-clinic-royalty-free-image-1661432441.jpg" width="100%">

                <h5 class="text-center">Orvosokat keresünk</h5>

                <a href="../hsm/application.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Jelentkezzen most!</button>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
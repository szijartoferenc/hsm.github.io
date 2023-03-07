<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pályázók jelentkezése</title>
</head>
<body>
    <?php 
    
    include("../include/header.php");
    
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px">
                    <?php 
                    
                    include("navside.php");

                    ?>

                </div>
                <div class="col-md-10">
                    <h5 class="text-center my">Állásra jelentkezők </h5>

                    <div id="show"></div>
                </div>
            </div>
        </div>

    </div>
  
    <!-- Javascript gombok funkciói -->
   <script src="script.js" type="text/javascript"></script>

</body>
</html>
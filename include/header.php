<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-info bg-info">

<h5 class="text-white">Great Plains General Hospital</h5>
     
     <div class="me-auto"></div>

     <ul class="navbar-nav"> 
     <?php 
     if (isset($_SESSION['admin'])) {

        $user = $_SESSION['admin'];
        echo '

       
        <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Kilépés</a></li>          
        ';
     } else if (isset($_SESSION['doctor'])) {
      $user = $_SESSION['doctor'];
        echo '
        <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">Kilépés</a></li>          
        ';

     } else if (isset($_SESSION['patient'])) {
         $user = $_SESSION['patient'];
           echo '
           <li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
           <li class="nav-item"><a href="logout.php" class="nav-link text-white">Kilépés</a></li>          
           ';


     }else {
        echo '
        <li class="nav-item"><a href="index.php" class="nav-link text-white">Kezdőoldal</a></li>
        <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Adminiszrátor</a></li>
        <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white"> Orvosok</a></li>
        <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Betegek</a></li> 
        
        ';
     }


    ?> 

       
     </ul>

     
     </nav>
     
</body>
</html>




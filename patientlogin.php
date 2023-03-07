<?php 

session_start();

include("../hsm/include/connection.php");

if (isset($_POST['login'])) {
   $username = $_POST ['username'];
   $password = $_POST ['pass'];
   
   $error = array();

   $q = "SELECT * FROM patients WHERE username='$username' AND password='$password'";
   $qq = mysqli_query($conn,$q);
   $row = mysqli_fetch_array($qq);

   if (empty($username)) {
        $error['login'] = "Írja be a felhasználónevet!";

   }else if(empty($password)) {
        $error['login'] = "Írja be a jelszót!";
   }

   if (count($error)==0) {
     $query = "SELECT * FROM patients WHERE username='$username' AND password='$password'";

     $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)==1) {
        echo "<script>alert('kész')</script>";

        $_SESSION ['patient'] = $username;

        header("Location: patient/index.php");
       
       
    }else {
        echo "<script>alert('hiba')</script>";
    }



   }

}

if (isset($error['login'])) {
    
    $l = $error['login'];

    $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
} else{
    $show="";
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beteg bejelentkezés</title>
</head>
<body style="background-image: url(img/blur-hospital.jpg); background-repeat: no-repeat; background-size:cover">
    <?php 
    include("include/header.php");
    ?>

<div class="container">
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-4 p-5 bg-light text-dark rounded">
                <h5 class="text-center my-5">Beteg bejelentkezés</h5>

              

                <form method="post" class="mx-2 my-5">
                    
                    <div class="form-group">
                    <label>Felhasználónév:</label>
                    <input type="text" name="username" class="form-control"
                    autocomplete="off" placeholder="Felhasználónév beírása">
                    </div>

                    <div class="form-group">
                    <label>Jelszó:</label>
                    <input type="password" name="pass" class="form-control">
                    </div>

                   <input type="submit" name="login" class="btn btn-success my-3" value="Belépés">

                   <p> Nincs felhasználói fiókom   <a href="account.php">Regisztráció</a></p>



                </form>


            </div>
            <div class="col-md-3"></div>

            </div>

        </div>

        </div>
    </div>

    
</body>
</html>
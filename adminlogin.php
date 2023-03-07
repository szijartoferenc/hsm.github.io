<?php 

session_start();

include("../hsm/include/connection.php");

if (isset($_POST['login'])) {
   $username = $_POST ['uname'];
   $password = $_POST ['pass'];

   $error = array();

   if (empty($username)) {
        $error['admin'] = "Írja be a felhasználónevet!";

   }else if(empty($password)) {
        $error['admin'] = "Írja be a jelszót!";
   }

   if (count($error)==0) {
     $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

     $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) == 1) {
        echo "<script>alert('Adminként jelentkezett be')</script>";

        $_SESSION ['admin'] = $username;

        header("Location: admin/index.php");
        exit(); 
       
    }else {
        echo "<script>alert('Érvénytelen felhasználónév vagy jelszó')</script>";
    }



   }

}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin bejelentkezés</title>
</head>
<body style="background-image: url(img/background03.jpg); background-repeat: no-repeat; background-size:cover">
    <?php 
    include("include/header.php");
    ?>

    <div style="margin-top: 20px;"></div>

    <div class="container">
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-4 p-5 bg-secondary text-white rounded">
                <img src="./img/admin01.png" class="col-md-12">

                <form method="post" class="my-2">
                    
                    <div>
                        <?php 
                        
                        if (isset($error['admin'])) {
                           

                            $sh = $error ['admin'];
                            $show = "<h4 class='alert alert-danger'> $sh</h4>"; 


                            
                        } else {

                            $show = "";
                            
                        }

                        echo $show;


                        
                        ?>

                    </div>


                    <div class="form-group">
                    <label>Felhasználónév:</label>
                    <input type="text" name="uname" class="form-control"
                    autocomplete="off" placeholder="Felhasználónév beírása">
                    </div>

                    <div class="form-group">
                    <label>Jelszó:</label>
                    <input type="password" name="pass" class="form-control">
                    </div>

                   <input type="submit" name="login" class="btn btn-success my-3" value="Bejelentkezés">



                </form>


            </div>
            <div class="col-md-3"></div>

            </div>

        </div>

        </div>
    </div>
</body>
</html>

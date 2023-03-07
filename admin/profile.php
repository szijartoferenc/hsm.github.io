<?php

session_start();

ob_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin profil</title>
</head>

<body>

    <?php
    include("../include/header.php");

    include("../include/connection.php");

    $adm = $_SESSION['admin'];

    $query = "SELECT * from admin WHERE username='$adm'";

    $res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($res)) {

        $username = $row['username'];
        $profiles = $row['profile'];
    }

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php

                    include("navside.php");
                    include("../include/connection.php");
                    ?>

                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username; ?> Profil</h4>

                                <?php

                                if (isset($_POST['update'])) {

                                    $profile = $_FILES['profile']['name'];

                                    if (empty($profile)) {
                                    } else {
                                        $query = "UPDATE admin SET profile='$profile' WHERE username ='$adm'";

                                        $result = mysqli_query($conn, $query);

                                        if ($result) {
                                            move_uploaded_file( 
                                                $_FILES['profile']['tmp_name'],
                                                "img/$profile");
                                        } 
                                        print("<script>setTimeout(()=>window.location='profile.php',1000)</script>"); 
                                    }
                                   
                                }


                                ?>

                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                    echo "<img src='img/$profiles' class='col-md-12' style='height: 200px;'>";
                                    ?>

                                    <br><br>
                                    <div class="form-group">
                                        <label>Feltöltés</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="FELTÖLTÉS" class="btn btn-success">
                                </form>
                            </div>
                            <!--Felhasználónév csere--->
                            <div class="col-md-6">

                                <?php

                                if (isset($_POST['change'])) {

                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {
                                    } else {
                                        $query = "UPDATE admin SET username='$uname' WHERE username='$adm'";

                                        $res = mysqli_query($conn, $query);

                                        if ($res) {

                                          
                                        }
                                    }
                                    print("<script>setTimeout(()=>window.location='profile.php',1000)</script>");
                                }

                                ?>

                                <form method="post">
                                    <label>Felhasználónév cseréje</label>
                                    <input type="text" name="uname" class="form-control my-2" autocomplete="off">
                                    <input type="submit" name="change" class="btn btn-success">

                                </form>

                                <br>

                                <?php

                                /* jelszó csere */

                                if (isset($_POST['update_pass'])) {

                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();

                                    $old = mysqli_query($conn, "SELECT * FROM admin WHERE username='$adm'");

                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'];



                                    if (empty($old_pass)) {
                                        $error['p'] = "Írja be a rég jelszót";
                                    } else if (empty($new_pass)) {
                                        $error['p'] = "Írja be az új jelszót";
                                    } else if (empty($con_pass)) {
                                        $error['p'] = "Írja be az új jelszót ismét";
                                    } else if (empty($con_pass)) {
                                        $error['p'] = "Írja be az új jelszót ismét";
                                    } else if (($old_pass != $pass)) {
                                        $error['p'] = "A jelszó érvénytelen";
                                    } else if (($new_pass != $con_pass)) {
                                        $error['p'] = "A megadott jelszavak nem egyeznek";
                                    }
                                        if (count($error) == 0) {
                                            $query = "UPDATE admin SET password='$new_pass' WHERE username='$adm'";

                                            mysqli_query($conn, $query);
                                            
                                        }

                                       
                                    
                                    // print("<script>setTimeout(()=>window.location='profile.php',1000)</script>");
                                }

                                if (isset($error['p'])) {
                                    $e = $error['p'];

                                    $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                } else {
                                    $show = "";
                                }
                                ?>

                                <!-- /* jelszó csere beviteli mezők */ -->
                                <form method="post">
                                    <h5 class="text-center">Jelszócsere </h5>
                                        <div>
                                            <?php 
                                           echo $show;
                                            ?>
                                        </div>
                                    <div class="form-group">
                                        <label>Régi jelszó</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Új jelszó</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jelszó megerősítése</label>
                                        <input type="password" name="con_pass" class="form-control">
                                        
                                    </div>

                                    <input type="submit" name="update_pass" value="Jelszó csere" class="btn btn-success my-2">

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
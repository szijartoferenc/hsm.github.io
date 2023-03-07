<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orvos profil</title>
</head>

<body>

    <?php
    include("../include/header.php");

    include("../include/connection.php");

    $pat = $_SESSION['patient'];

$query = "SELECT * from patients WHERE username='$pat'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

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
                                <?php
                                $pat = $_SESSION['patient'];
                                $query = "SELECT * FROM patients WHERE username='$pat'";

                                $result = mysqli_query($conn, $query);

                                $row = mysqli_fetch_array($result);


                                ?>

                                <form method="post" enctype="multipart/form-data">
                                    <?php

                                    echo "<img src='img/" .$row['profile']. "' style='height:200px;' class='col-md-12 my-3'>";
                                    ?>

                                    <input type="file" name="img" class="form-control my-1">
                                    <input type="submit" name="upload" value="Feltöltés" class="btn btn-success my-2">
                                    
                                </form>
                                <div class="col-md-3">
                                    <table class="table table-bordered my-4">
                                        <tr>
                                            <th colspan="2" class="text-center">Orvosi adatok</th>
                                        </tr>
                                        <tr>
                                            <td>Vezetéknév:</td>
                                            <td><?php echo $row['surname'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keresztnév:</td>
                                            <td><?php echo $row['firstname'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Felhasználónév:</td>
                                            <td><?php echo $row['username'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><?php echo $row['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Telefon:</td>
                                            <td><?php echo $row['phone'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Neme:</td>
                                            <td><?php echo $row['gender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ország:</td>
                                            <td><?php echo $row['country'] ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <!--Felhasználónév csere--->
                            <div class="col-md-6">

                                <?php

                                if (isset($_POST['change'])) {

                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {
                                    } else {
                                        $query = "UPDATE patients SET username='$uname' WHERE username='$pat'";

                                        $result = mysqli_query($conn, $query);

                                        if ($result) {
                                            $_SESSION['patient'] = $uname;
                                        }
                                    }
                                    print("<script>setTimeout(()=>window.location='profile.php',1000)</script>");
                                    echo "<script>alert('kész')</script>";
                                }

                                ?>



                                <form method="post">
                                    <label>Felhasználónév cseréje</label>
                                    <input type="text" name="uname" class="form-control my-2" autocomplete="off">
                                    <input type="submit" name="change" class="btn btn-success">

                                </form>

                                <br>
                                <?php
                                if (isset($_POST['update_pass'])) {

                                    $old_pass = $_POST['old_pass'];
                                    $new_pass = $_POST['new_pass'];
                                    $con_pass = $_POST['con_pass'];

                                    $error = array();

                                    $old = mysqli_query($conn, "SELECT * FROM patients WHERE username='$pat'");

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
                                        $query = "UPDATE patients SET password='$new_pass' WHERE username='$pat'";

                                        mysqli_query($conn, $query);
                                    }

                                    echo "<script>alert('kész')</script>";


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
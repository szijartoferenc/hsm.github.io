<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szerkesztés orvosok</title>
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
                    <h5 class="text-center">Adatok szerkesztése</h5>

                    <?php 
                    
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $query = "SELECT * FROM doctors WHERE id='$id'";
                       
                        $result = mysqli_query($conn, $query);

                        $row =mysqli_fetch_array($result);
                    }
                                                         
                    
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                <th  class="text-center" colspan="2"><h3> Orvos adatai </h3></th>
                                </tr>
                                <tr>
                                    <td><h5 class="">ID: </h5></td>
                                    <td><h5 class=""><?php echo $row['id']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Vezetéknév: </h5></td>
                                    <td><h5 class=""><?php echo $row['surname']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Keresztnév: </h5></td>
                                    <td><h5 class=""><?php echo $row['firstname']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Felhasználónév: </h5></td>
                                    <td><h5 class=""><?php echo $row['username']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Email: </h5></td>
                                    <td><h5 class=""><?php echo $row['email']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Telefonszám: </h5></td>
                                    <td><h5 class=""><?php echo $row['phone']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Neme: </h5></td>
                                    <td><h5 class=""><?php echo $row['gender']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Ország: </h5></td>
                                    <td><h5 class=""><?php echo $row['country']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Regisztráció: </h5></td>
                                    <td><h5 class=""><?php echo $row['data_reg']; ?></h5></td>
                                </tr>
                                <tr>
                                    <td><h5 class="">Fizetés: </h5></td>
                                    <td><h5><?php echo $row['salary']; ?></h5></td>
                                </tr>

                            </table>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-center">Fizetés feltöltése</h5>
                          <?php 
                          if (isset($_POST['update'])) {
                            
                            $salary= $_POST['salary'];

                            $query = "UPDATE doctors SET salary='$salary' WHERE id='$id'";

                            mysqli_query($conn,$query);
                          }
                          
                          
                          ?>

                        <form method="post">
                         <label>Fizetés összege:</label>
                         <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Írja be az összeget" 
                         value="<?php echo $row['salary'] ?>">
                         <input type="submit" name="update" class="btn btn-info my-3" value="Fizetés rögzítése">
                        </form>
                    </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

</body>
</html>
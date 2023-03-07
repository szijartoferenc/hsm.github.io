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
    <title>Admin </title>
</head>
<body>

    <!----A header és az adatbázis---->
    <?php
include ("../include/header.php");
include ("../include/connection.php");


    ?>
<div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2" style="margin-left: -30px;">
        <?php 
        
        include("navside.php");
        include ("../include/connection.php");

       

        ?>
        </div>
        <div class="col-md-10">
           <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                 <h5 class="text-center">Összes admin</h5>
                     <!----az adatbázis kiépítése---->
                        <?php 
                        $ad = $_SESSION['admin'];
                        $query = "SELECT * FROM admin WHERE id !='$ad'";
                        $res = mysqli_query($conn,$query);

                            $output= " 
                            <table class='table table-bordered'>
                                <tr>
                                <th>ID</th>
                            <th>Felhasználónév</th>
                            <th style='width: 10%;'>Esemény</th>
                            <tr>
                            ";

                        if (mysqli_num_rows($res)  < 1) {
                            $output .="<tr><td colspan='3' class='text-center'>Nincs új admin</td></tr>";
                        }

                        while ($row = mysqli_fetch_array($res)) {
                            $id = $row['id'];
                            $username = $row['username'];

                            $output .="
                            <tr>
                            <td>$id</td>
                            <td>$username</td>
                            <td>
                            <a href='admin.php?id=$id'> <button id='$id' class='btn btn-danger'>Törlés</button> </a>
                            </td> 
                            
                            "; 
                        }  
                            $output .="
                            </tr>
                            </table>
                            ";

                            echo $output;

                            /*----Törlés gomb----*/

                            if (isset($_GET['id'])) {
                              $id= $_GET['id'];

                              $query = "DELETE FROM admin WHERE id='$id'";
                              mysqli_query($conn, $query);
                            }  
                              
                         
                        ?>
                 <!----az adatbázis kiépítés vége---->
                    
                        
                    

                </div>
                <div class="col-md-6">
                        <?php 

                        /* Új admin hozzáadása */
                        
                        if (isset($_POST['add'])) {
                            
                            $uname = $_POST['uname'];
                            $pass = $_POST['pass'];
                            $image = $_FILES['img']['name'];

                            $error = array();

                            if (empty($uname)) {
                                $error['u'] = "Írja be az admin felhasználónevet";
                                                          
                            } else if (empty($pass)) {
                                $error['u'] = "Írja be a admin jelszót";

                            }else if (empty($image)) {
                                $error['img'] = "Adjon hozzá képet";
                            }

                            if (count($error) ==0) {
                                $q = "INSERT INTO admin(username,password,profile) VALUES('$uname','$pass','$image')";

                                $result = mysqli_query($conn,$q);
                                if (mysqli_error($conn)) {
                                    exit(mysqli_error($conn));
                                }

                                if ($result) {
                                    move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                }else {
                                    
                                }
                               print("<script>setTimeout(()=>window.location='admin.php',1000)</script>");
                            }
                        }

                        if (isset($error['u'])) {
                           $er = $error['u'];

                           $show= "<h5 class='text-center alert alert-danger'>$er</h5>";
                        }else {
                            $show="";
                        }

                         /* Új admin hozzáadása  vége*/
                        ?>
                       
                      

                <h5 class="text-center">Admin hozzáadása</h5>
                <form method="post" enctype="multipart/form-data">
                    <div> 
                        <?php echo $show; ?>
                    </div>
                    <div class="form-group">
                        <label >Felhasználónév</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                            <label>Jelszó</label>
                            <input type="password" name="pass" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kép</label>
                        <input type="file" name="img" class="form-control">
                    </div><br>
                    <input type="submit" name="add" value="Új admin hozzáadása" class="btn btn-success">
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




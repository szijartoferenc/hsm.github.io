<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Összes orvos</title>
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
            <h5 class="text-center">Összes beteg</h5>
        <?php 
        
        $query = "SELECT * FROM patients  ORDER BY data_reg ASC";

        $result = mysqli_query($conn, $query);



        $output ="";



        $output .="
        
                <table class='table table-bordered'>  
                
                    <tr>
                    <th>ID</th>
                    <th>Vezetkénév</th>
                    <th>Keresztnév</th>
                    <th>Felhasználónév</th>
                    <th>Neme</th>
                    <th>Telefonszám</th>
                    <th>Ország</th>
                    <th>Regisztráció ideje</th>
                    </tr>       
         
        ";
        
        
        if (mysqli_num_rows($result) < 1) {
            $output .="
             <tr>
             <td colspan='10'class='text-center'>Nincs már több beteg</td>
             
             </tr>
            
            ";
        }
        
        while ($row = mysqli_fetch_array($result)) {
        $output .="
           <tr>
           <td>".$row['id']."</td>
           <td>".$row['surname']."</td>
           <td>".$row['firstname']."</td>
           <td>".$row['username']."</td>
           <td>".$row['gender']."</td>
           <td>".$row['phone']."</td>
           <td>".$row['country']."</td>
           <td>".$row['data_reg']."</td>
           <td>
            <a href='view.php?id=".$row['id']."'>
            
            <button class='btn btn-info'>Megtekintés</button>
            
            </a>
           </td>
           
        
        ";
        
        
        }
        
        $output.= "
        </tr>
        </table>
        ";
        
        echo $output;
        



        
        ?>


        </div>

        </div>
        </div>
       
    </div>
</body>
</html>


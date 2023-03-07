<?php 

include("../include/connection.php");

$query = "SELECT * FROM doctors WHERE status='Pending'ORDER BY data_reg ASC";
$result = mysqli_query($conn,$query);




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
            <th>Esemény</th>
            </tr>       
 
";


if (mysqli_num_rows($result) < 1) {
    $output .="
     <tr>
     <td colspan='10'class='text-center'>Nincs már függő jelentkezés</td>
     
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
     <div class='col-md-12'> 
      <div class='row'>
      <div class='col-md-6'>
      <button id='".$row['id']."' class='btn btn-success approve'>Jóváhagyás</button>
      </div>
      <div class='col-md-6'>
      <button id='".$row['id']."' class='btn btn-danger reject'>Elutasítás</button>
      </div>
      </div>
     </div>
   </td>
   

";


}

$output.= "
</tr>
</table>
";

echo $output;

?>
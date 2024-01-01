<?php
include "../database/connect.php";

$conn = (new Connection())->getConnection();

if(isset($_GET['deleteid'])){
      $id = $_GET['deleteid'];
      $query = "DELETE FROM TEST_I.CART WHERE id = $id";
      $result = mysqli_query($conn,$query);
      if($result){
        header("Location: cart.php");
      }else{
        die("Error : ". mysqli_error($conn));
      }
}




?>
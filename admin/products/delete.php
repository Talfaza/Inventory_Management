<?php
include "../../database/connect.php";

$conn = (new Connection())->getConnection();

if(isset($_GET['deleteid'])){
      $id = $_GET['deleteid'];
      $query = "DELETE FROM TEST_I.PRODUCT WHERE id = $id";
      $query = "DELETE FROM TEST_I.PRICE WHERE id = $id";
      $query = "DELETE FROM TEST_I.QUANTITY WHERE id = $id";
      $result = mysqli_query($conn,$query);
      if($result){
        header("Location: contact.php");
      }else{
        die("Error : ". mysqli_error($conn));
      }
}




?>
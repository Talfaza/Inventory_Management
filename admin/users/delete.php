<?php
include "../../database/connect.php";

$conn = (new Connection())->getConnection();

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $query = "DELETE FROM TEST_I.USER WHERE id = $id"; // Update table name to TEST_I.USER
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: users.php");
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>

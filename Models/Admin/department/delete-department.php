<?php
if( isset($_GET["department_id"])){
    $department_id = $_GET["department_id"];

    //connection
    include('../../../core/database/database.php');


    $sql = "DELETE FROM departments WHERE department_id=$department_id";
    $connection->query($sql);

}

header("location:./department-lists.php");
exit;
?>
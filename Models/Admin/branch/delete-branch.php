<?php
if( isset($_GET["branch_id"])){
    $branch_id = $_GET["branch_id"];

    //connection
    include('../../../core/database/database.php');


    $sql = "DELETE FROM branches WHERE branch_id = $branch_id";
    $connection->query($sql);

}

header("location:../../views/Branches.php");
exit;
?>
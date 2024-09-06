<?php 
    if( isset($_GET["applicant_id"])){
    $applicant_id = $_GET["applicant_id"];

    //connection
    include('../../../core/database/database.php');

    $sql = "DELETE FROM applicants WHERE applicant_id = $applicant_id";
    $connection->query($sql);

}
header("location:../../views/Job-applicants.php");
exit;
?>
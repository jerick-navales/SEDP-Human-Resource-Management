<?php
//connection
include("../../../core/database/database.php");
$branch_id ="";
$name ="";
$location ="";


$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] =='GET'){
    if ( !isset($_GET["branch_id"])){
        header("location:../../views/Branches.php");
        exit;
    }
    
    $branch_id =$_GET["branch_id"];

    //read the row of the selected data
    $sql = "SELECT * FROM `branches` WHERE branch_id = $branch_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if ( !$row ){
        header("location:../../views/Branches.php");
        exit;
    }

    $name = $row["name"];
    $location = $row["location"];
}
else{
    //Update the data go the branch
    $branch_id =$_POST['branch_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    do {
        if ( empty($branch_id) || empty($name) || empty($location)){
            $errorMessage = "all the field are required";
            break;    
        }
        $sql = "UPDATE branches SET name = '$name', location = '$location'" .
                "WHERE branch_id = $branch_id";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Branch Updated Succefuly!";
        header("location:../../views/Branches.php");
        exit;

    } while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Branch</title>
    <link rel="stylesheet" href="../../../public/assets/css/AdminStyle.css">
    <?php
        include_once '../../../public/assets/links/bootstrap-links.php';
    ?>
    
</head>
<body>
<div class="wrapper">
    <!--sidebar-->
    <?php
    include_once('../../../core/includes/admin-side-bar.php');
    ?>
    <main class="main m-2">
        <div class="container my-5">
            <h2 m-2>Update Branch</h2>
            <hr class="md-ms-6" width="650px">

            <?php 
            if ( !empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                ";
            }
            ?>

            <form method="post">
                <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>">
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="row mb-2">
                    <label  class="col-sm-2 col-form-label">location</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="location" value="<?php echo $location; ?>">
                    </div>
                </div>
                <?php
                if ( !empty($successMessage) ){
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-2 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                    </div>
                    ";
                }
                ?>
                <div class="row mb-2 ">
                    <div class="offset-sm-2 col-sm-2 d-grid mb-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-sm-2 d-grid mb-2">
                        <a class="btn btn-outline-primary" href="./branches-list.php">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="../../../public/assets/javascript/AdminPage.js"></script>   
</body>
</html>
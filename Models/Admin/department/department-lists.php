<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Departments</title>
    <?php 
        include('../../../public/assets/links/bootstrap-links.php');
    ?>
    <link rel="stylesheet" href="../../public/assets/css/AdminStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="wrapper">
        <!--sidebar-->
        <?php
            include('../../../core/includes/admin-side-bar.php');
        ?>
        <!--add Departments-->
        <main class="main">
            <div class="container" my-4>
                <br>
                <h3>List Of Departments</h3>
                <hr>
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end px-6">
                        <form action="search-department.php" method="GET">
                            <div class="input-group mb-2">
                                <input type="text" name="search" value="" class="form-control" placeholder="Search Department">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <div>
                        <a class="btn btn-primary" href="./create-department.php"> Create</a>
                    </div>
                    </div>
                </div>
                <br>
                <table class="table table-striped">
                    <thead class="table-primary ">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //connection
                    include("../../../core/database/database.php");
                    //read all row from database table
                    $sql= "SELECT * FROM departments";
                    $result = $connection->query($sql);
        
                    if (!$result) {
                        die("Invalid Query". $connection->error);
                    }
                    //read data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo"
                        <tr>
                            <td>$row[department_id]</td>
                            <td>$row[name]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='./edit-department.php?department_id=$row[department_id]'><i class='bi bi-pencil-square'></i></a>
                                <a class='btn btn-danger btn-sm' href='./delete-department.php?department_id=$row[department_id]'><i class='bi bi-trash'></i></a>
                            </td>
                        </tr>
                            ";
                    }
        
                    ?>
                    </tbody>
                    
                </table>
            </div>
        </main>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../../../public/assets/javascript/AdminPage.js"></script>
</body>

</html>
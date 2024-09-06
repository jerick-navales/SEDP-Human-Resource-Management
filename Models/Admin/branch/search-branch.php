<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches</title>
    <?php 
        include('../../../public/assets/links/bootstrap-links.php');
    ?>
    <link rel="stylesheet" href="../../public/assets/css/AdminStyle.css">
</head>

<body>
    <div class="wrapper">
        <!--sidebar-->
        <?php
            include_once('../../../core/includes/admin-side-bar.php');
        ?>
        <!--add employee-->
        <main class="main">
            <div class="container" my-4>
                <br>
                <h3>List Of Branches</h3>
                <hr>
                <div class="row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end px-6">
                        <form action="search-branch.php" method="GET">
                            <div class="input-group mb-2">
                                <input type="text" name="search" value="" class="form-control" placeholder="Search Branch">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <div>
                        <a class="btn btn-primary" href="./create-branch.php"> Create</a>
                    </div>
                    </div>
                </div>
                <br>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>LOCATION</th>
                            <th>CREATED DATE</th>
                            <th>OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //connection
                    include("../../../core/database/database.php");
                    //read all row from database table

                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                    // Prepare SQL query
                    if (!empty($search)) {
                        $searchTerm = $connection->real_escape_string($search);
                        $sql = "SELECT * FROM branches WHERE name LIKE '%$searchTerm%' ORDER BY branch_id DESC";
                    } else {
                        $sql = "SELECT * FROM branch ORDER BY branch_id DESC";
                    }

                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid Query: " . $connection->error);
                    }
                    //read data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo"
                        <tr>
                            <td>$row[branch_id]</td>
                            <td>$row[name]</td>
                            <td>$row[location]</td>
                            <td>$row[created_date]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='../models/employee/editEmployee.php?branch_id=$row[branch_id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='./delete-branch.php?branch_id=$row[branch_id]'>delete</a>
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
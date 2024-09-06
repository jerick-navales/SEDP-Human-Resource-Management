<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <?php 
        include('../../../public/assets/links/bootstrap-links.php');
    ?>
    <link rel="stylesheet" href="../../../public/assets/css/AdminStyle.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php
            include('../../../core/includes/admin-side-bar.php'); 
        ?>
        <!-- Main Content -->
        <main class="main">
            <div class="container my-5">
                <h3>List Of Applicants</h3>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <form action="search-applicant.php" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" class="form-control" placeholder="Search Applicant">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>APPLIED DATE</th>
                            <th>OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Connection
                    include("../../../core/database/database.php");

                    // Check if search term is set and not empty
                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                    // Prepare SQL query
                    if (!empty($search)) {
                        $searchTerm = $connection->real_escape_string($search);
                        $sql = "SELECT * FROM applicants WHERE name LIKE '%$searchTerm%' ORDER BY applicant_id DESC";
                    } else {
                        $sql = "SELECT * FROM applicants ORDER BY applicant_id DESC";
                    }

                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid Query: " . $connection->error);
                    }

                    // Read data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['applicant_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['applied_date']}</td>
                            <td>
                                <a class='btn btn-danger btn-sm' href='../models/applicant/delete-applicant.php?applicant_id=$row[applicant_id]'>delete</a>
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

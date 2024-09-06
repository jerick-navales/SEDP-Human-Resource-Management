<?php
// Connection
include("../../../core/database/database.php");

$department_id = "";
$name = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["department_id"])) {
        header("location:../../views/AdminLandingPage.php");
        exit;
    }

    $department_id = $_GET["department_id"];

    // Read the row of the selected data
    $sql = "SELECT * FROM `departments` WHERE department_id = $department_id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:./department-lists.php");
        exit;
    }

    $name = $row["name"];
} else {
    // Update the data of the department
    if (!isset($_POST['department_id']) || !isset($_POST['name'])) {
        $errorMessage = "All fields are required";
    } else {
        $department_id = $_POST['department_id'];
        $name = $_POST['name'];

        do {
            if (empty($department_id) || empty($name)) {
                $errorMessage = "All fields are required";
                break;
            }

            $sql = "UPDATE departments SET name = '$name' WHERE department_id = $department_id";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $successMessage = "Department Updated Successfully!";
            header("location:./department-lists.php");
            exit;
        } while (false);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Department</title>
    <link rel="stylesheet" href="../../../public/assets/css/AdminStyle.css">
    <?php include_once '../../../public/assets/links/bootstrap-links.php'; ?>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar">
        <div class="d-flex" id="sideheader">
            <button class="toggle-btn" type="button">
                <img src="../../../public/assets/images/logo.webp" alt="logo">
            </button>
            <div class="sidebar-logo">
                <a href="#">SEDP</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="../../views/AdminDashboard.php" class="sidebar-link">
                    <i class="lni lni-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-link">
                <p>Human Resource MS</p>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-users"></i>
                    <span>Employee's</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-search"></i>
                    <span>Job Applicants</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-consulting"></i>
                    <span>Recruitment</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                   data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-protection"></i>
                    <span>Branches</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Branch</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Department</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Job position</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-link">
                <p>Scholarship MS</p>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                   data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                    <i class="lni lni-graduation"></i>
                    <span>Scholar</span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Scholars</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Programs</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Compliance</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Requests</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="#" class="sidebar-link">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    <main class="main m-2 ">
        <div class="container my-5">
            <h2 m-2>Update Department</h2>
            <hr class="md-ms-6" width="650px">

            <?php 
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                ";
            }
            ?>

            <form method="post">
                <input type="hidden" name="department_id" value="<?php echo $department_id; ?>">
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>
                <?php
                if (!empty($successMessage)) {
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
                        <a class="btn btn-outline-primary" href="./department-lists.php">Cancel</a>
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

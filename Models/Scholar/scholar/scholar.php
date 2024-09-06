<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="../../../public/assets/css/AdminStyle.css">
    <?php 
        include('../../../public/assets/links/bootstrap-links.php');
    ?>
</head>

<body>
    <div class="wrapper">
    <?php
    include_once('../../../core/includes/admin-side-bar.php');
    ?>

        <div class="main">
        <div class="container text-center">
                <div class="row my-5 p-5">
                <h1 class="fw-bold fs-1">Scholar</h1>
                <h2 class="text-muted lead">Dashboard here!</h2>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../../../public/assets/javascript/AdminPage.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>
<?php
include('../../Core/Includes/header.php');
$title='Scholars';
$page='Scholars';
?>

<div class="wrapper">
    <?php include("../../Core/Includes/sidebar.php"); ?>
    <div class="main p-3">
        <h5><span class="material-symbols-outlined arrow-icon">chevron_right</span> Scholar Recipients</h5> <!-- Added Material Symbols arrow icon -->
        <div class="container">
            <h3>Scholar Recipients</h3>
            <hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="search-sort-add">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span> <!-- Added search icon -->
                            </div>
                            <input type="text" class="form-control" id="search" placeholder="Search Scholar">
                        </div>
                        <select class="form-select" id="sort">
                            <option selected>Sort By</option>
                            <option value="name">Name</option>
                            <option value="school">School</option>
                            <option value="admission_date">Admission Date</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addEditModal">Add</button>
                </div>
            </div>
            <table class="table table-striped">
                <thead style="background-color: #C2EEFF;"> <!-- Added header background color -->
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">School</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Admission Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="recipientTable">
                    <!-- Data will be loaded here via AJAX -->
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Add/Edit Modal -->
    <div class="modal fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="recipientForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEditModalLabel">Add/Edit Scholar Recipient</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="recipientId" name="id">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="school">School</label>
                            <input type="text" class="form-control" id="school" name="school" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                        </div>
                        <div class="form-group">
                            <label for="admission_date">Admission Date</label>
                            <input type="date" class="form-control" id="admission_date" name="admission_date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../Js/script.js"></script>
</body>
</html>

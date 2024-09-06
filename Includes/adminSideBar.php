<aside id="sidebar">
    <div class="d-flex" id="sideheader">
            <button class="toggle-btn" type="button">
                <?php
                include('svg.php');
                ?>
            </button>
            <div class="sidebar-logo">
                <h2>Admin</h2>
            </div>
    </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="../../Views/Admin/AdminDashboard.php" class="sidebar-link">
                <i class="lni lni-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-link">
                <p>Human Resource MS</p>
            </li>
            <li class="sidebar-item">
                <a href="../../Views/Admin/EmployeeLandingPage.php" class="sidebar-link">
                <i class="lni lni-users"></i>
                <span>Employee's</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="../../Views/Admin/JobApplicants.php" class="sidebar-link">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Job Applicants</span>
                </a>
            </li>
                
            <li class="sidebar-item">
                <a href="../../Views/Admin/ReqcruitmentPage.php" class="sidebar-link">
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
                        <li class="sidebar-item mx-4">
                            <a href="../../Views/Admin/branches.php" class="sidebar-link">Branche</a>
                        </li>
                        <li class="sidebar-item mx-4">
                            <a href="../../app/models/department/department-lists.php" class="sidebar-link">Department</a>
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
                        <li class="sidebar-item mx-4">
                            <a href="../../../../../scholar.php" class="sidebar-link">Scholars</a>
                        </li>
                        <li class="sidebar-item mx-4">
                            <a href="../../app/models/scholar/scholar.php" class="sidebar-link">Programs</a>
                        </li>
                        <li class="sidebar-item mx-4">
                            <a href="#" class="sidebar-link">Compliance</a>
                        </li>
                        <li class="sidebar-item mx-4">
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
<script src="./Assets/Js/sidebarScript.js"></script>
        
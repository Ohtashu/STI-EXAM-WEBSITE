<?php
// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar bg-white shadow-sm" style="width: 250px; min-height: calc(100vh - 60px); position: fixed; top: 60px; left: 0; z-index: 1000;">
    <div class="p-3">
        <nav class="nav flex-column">
            <a class="nav-link d-flex align-items-center <?php echo $current_page == 'admin.php' ? 'active' : ''; ?>" 
               href="admin.php">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
            <a class="nav-link d-flex align-items-center <?php echo $current_page == 'special_exam_requests.php' ? 'active' : ''; ?>" 
               href="special_exam_requests.php">
                <i class="bi bi-file-earmark-text me-2"></i>
                Special Exam Requests
            </a>
            <a class="nav-link d-flex align-items-center <?php echo $current_page == 'manage_students.php' ? 'active' : ''; ?>" 
               href="manage_students.php">
                <i class="bi bi-people me-2"></i>
                Manage Students
            </a>
            <a class="nav-link d-flex align-items-center <?php echo $current_page == 'approved_requests.php' ? 'active' : ''; ?>" 
               href="approved_requests.php">
                <i class="bi bi-check-circle me-2"></i>
                Approved Requests
            </a>
            <a class="nav-link d-flex align-items-center <?php echo $current_page == 'schedule_management.php' ? 'active' : ''; ?>" 
               href="schedule_management.php">
                <i class="bi bi-calendar3 me-2"></i>
                Schedule Management
            </a>
            <a class="nav-link d-flex align-items-center <?php echo $current_page == 'notifications.php' ? 'active' : ''; ?>" 
               href="notifications.php">
                <i class="bi bi-bell me-2"></i>
                Notifications
            </a>
            <a class="nav-link d-flex align-items-center <?php echo $current_page == 'settings.php' ? 'active' : ''; ?>" 
               href="settings.php">
                <i class="bi bi-gear me-2"></i>
                Settings
            </a>
            <hr class="my-2">
            <a class="nav-link d-flex align-items-center text-danger" href="../logout.php">
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
            </a>
        </nav>
    </div>
</div>

<style>
.sidebar {
    transition: all 0.3s ease;
}

.sidebar .nav-link {
    color: #495057;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    margin-bottom: 0.25rem;
}

.sidebar .nav-link:hover {
    background-color: #f8f9fa;
    color: #002855;
}

.sidebar .nav-link.active {
    background-color: #002855;
    color: white;
}

/* Responsive sidebar */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }
    
    .sidebar.show {
        transform: translateX(0);
    }
    
    .main-content {
        margin-left: 0 !important;
    }
}

/* Add margin to main content to account for sidebar */
.main-content {
    margin-left: 250px;
    transition: all 0.3s ease;
}
</style>

<script>
// Toggle sidebar on mobile
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.querySelector('.navbar-toggler');
    const sidebar = document.querySelector('.sidebar');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }
});
</script> 
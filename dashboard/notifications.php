<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// TODO: Add authentication check
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - SEMS</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #002855;
        }
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .notification-item {
            transition: all 0.2s ease;
            border-left: 4px solid transparent !important;
        }
        .notification-item:hover {
            background-color: #f8f9fa;
        }
        .notification-item.unread {
            background-color: #f0f7ff;
            border-left-color: var(--primary-color) !important;
        }
        .notification-item.unread .notification-title {
            font-weight: 600;
            color: var(--primary-color);
        }
        .notification-item.unread .notification-time {
            font-weight: 500;
        }
        .notification-content {
            flex: 1;
            min-width: 0; /* For text truncation to work */
        }
        .notification-title {
            margin-bottom: 0.25rem;
            color: #212529;
        }
        .notification-message {
            color: #6c757d;
            margin-bottom: 0.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .notification-time {
            color: #6c757d;
            font-size: 0.875rem;
        }
        .notification-actions {
            margin-left: 1rem;
            white-space: nowrap;
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        .dropdown-item {
            padding: 0.5rem 1rem;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
        .dropdown-item.active {
            background-color: var(--primary-color);
        }
        .unread-dot {
            width: 8px;
            height: 8px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content p-4">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-primary mb-0">Notifications</h2>
                <div class="d-flex gap-2">
                    <!-- Mark All as Read Button -->
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-check-double me-2"></i>Mark All as Read
                    </button>
                    
                    <!-- Filter Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-funnel me-2"></i>Filter by Status
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item active" href="#">All</a></li>
                            <li><a class="dropdown-item" href="#">Unread</a></li>
                            <li><a class="dropdown-item" href="#">Read</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Notifications List -->
            <div class="card">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="text-primary mb-0">Your Notifications</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Unread Notification 1 -->
                    <div class="notification-item unread d-flex align-items-center p-3 mb-2 border rounded-lg">
                        <div class="notification-content">
                            <h6 class="notification-title">
                                <span class="unread-dot"></span>
                                New Special Exam Request
                            </h6>
                            <p class="notification-message mb-1">
                                John Smith has submitted a new request for Data Structures (BSCS-301). The exam is scheduled for June 15, 2025.
                            </p>
                            <small class="notification-time">2 hours ago</small>
                        </div>
                        <div class="notification-actions">
                            <button class="btn btn-sm btn-info text-white me-2" title="View Details">
                                <i class="bi bi-arrow-right-circle-fill me-1"></i>View
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" title="Mark as Read">
                                <i class="bi bi-check-circle-fill"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Unread Notification 2 -->
                    <div class="notification-item unread d-flex align-items-center p-3 mb-2 border rounded-lg">
                        <div class="notification-content">
                            <h6 class="notification-title">
                                <span class="unread-dot"></span>
                                Schedule Update Required
                            </h6>
                            <p class="notification-message mb-1">
                                The exam venue for BSIT-401 (Networking) has been changed from Room 301 to Lab 205 due to maintenance.
                            </p>
                            <small class="notification-time">5 hours ago</small>
                        </div>
                        <div class="notification-actions">
                            <button class="btn btn-sm btn-info text-white me-2" title="View Details">
                                <i class="bi bi-arrow-right-circle-fill me-1"></i>View
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" title="Mark as Read">
                                <i class="bi bi-check-circle-fill"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Read Notification 1 -->
                    <div class="notification-item d-flex align-items-center p-3 mb-2 border rounded-lg">
                        <div class="notification-content">
                            <h6 class="notification-title">System Maintenance Notice</h6>
                            <p class="notification-message mb-1">
                                Scheduled system maintenance will occur on March 20, 2025, from 10:00 PM to 2:00 AM. The system will be temporarily unavailable.
                            </p>
                            <small class="notification-time">Yesterday at 3:00 PM</small>
                        </div>
                        <div class="notification-actions">
                            <button class="btn btn-sm btn-info text-white" title="View Details">
                                <i class="bi bi-arrow-right-circle-fill me-1"></i>View
                            </button>
                        </div>
                    </div>

                    <!-- Unread Notification 3 -->
                    <div class="notification-item unread d-flex align-items-center p-3 mb-2 border rounded-lg">
                        <div class="notification-content">
                            <h6 class="notification-title">
                                <span class="unread-dot"></span>
                                New Student Registration
                            </h6>
                            <p class="notification-message mb-1">
                                Maria Garcia has been registered for the Special Exam Management System. Course: BSCS, Year Level: 2nd Year.
                            </p>
                            <small class="notification-time">1 day ago</small>
                        </div>
                        <div class="notification-actions">
                            <button class="btn btn-sm btn-info text-white me-2" title="View Details">
                                <i class="bi bi-arrow-right-circle-fill me-1"></i>View
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" title="Mark as Read">
                                <i class="bi bi-check-circle-fill"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Read Notification 2 -->
                    <div class="notification-item d-flex align-items-center p-3 mb-2 border rounded-lg">
                        <div class="notification-content">
                            <h6 class="notification-title">Exam Request Approved</h6>
                            <p class="notification-message mb-1">
                                The special exam request for David Lee (BSIT-302) has been approved. The exam is scheduled for June 10, 2025.
                            </p>
                            <small class="notification-time">2 days ago</small>
                        </div>
                        <div class="notification-actions">
                            <button class="btn btn-sm btn-info text-white" title="View Details">
                                <i class="bi bi-arrow-right-circle-fill me-1"></i>View
                            </button>
                        </div>
                    </div>

                    <!-- Read Notification 3 -->
                    <div class="notification-item d-flex align-items-center p-3 mb-2 border rounded-lg">
                        <div class="notification-content">
                            <h6 class="notification-title">Proctor Assignment</h6>
                            <p class="notification-message mb-1">
                                You have been assigned as proctor for the BSEMC-201 exam on June 5, 2025, at Room 205.
                            </p>
                            <small class="notification-time">3 days ago</small>
                        </div>
                        <div class="notification-actions">
                            <button class="btn btn-sm btn-info text-white" title="View Details">
                                <i class="bi bi-arrow-right-circle-fill me-1"></i>View
                            </button>
                        </div>
                    </div>

                    <!-- Read Notification 4 -->
                    <div class="notification-item d-flex align-items-center p-3 mb-2 border rounded-lg">
                        <div class="notification-content">
                            <h6 class="notification-title">System Update Complete</h6>
                            <p class="notification-message mb-1">
                                The latest system update has been successfully installed. New features include improved notification system and enhanced reporting.
                            </p>
                            <small class="notification-time">1 week ago</small>
                        </div>
                        <div class="notification-actions">
                            <button class="btn btn-sm btn-info text-white" title="View Details">
                                <i class="bi bi-arrow-right-circle-fill me-1"></i>View
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="card-footer bg-white border-0 pt-0">
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
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
    <title>Admin Dashboard - SEMS</title>
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
        .overview-card {
            transition: transform 0.2s;
        }
        .overview-card:hover {
            transform: translateY(-5px);
        }
        .badge {
            padding: 0.5em 0.75em;
        }
        .table th {
            font-weight: 600;
            background-color: #f8f9fa;
        }
        .announcement-card {
            border-left: 4px solid var(--primary-color);
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <?php include '../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content p-4">
        <div class="container-fluid">
            <!-- Page Title -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Dashboard Overview</h4>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>New Request
                </button>
            </div>

            <!-- Overview Cards -->
            <div class="row g-4 mb-4">
                <!-- Total Requests -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card overview-card bg-primary text-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-1">Total Requests</h6>
                                    <h3 class="mb-0">150</h3>
                                </div>
                                <div class="fs-1">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card overview-card bg-warning text-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-1">Pending</h6>
                                    <h3 class="mb-0">45</h3>
                                </div>
                                <div class="fs-1">
                                    <i class="bi bi-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approved Requests -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card overview-card bg-success text-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-1">Approved</h6>
                                    <h3 class="mb-0">95</h3>
                                </div>
                                <div class="fs-1">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rejected Requests -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card overview-card bg-danger text-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-1">Rejected</h6>
                                    <h3 class="mb-0">10</h3>
                                </div>
                                <div class="fs-1">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Recent Requests Table -->
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <h5 class="card-title mb-0">Recent Requests</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Course</th>
                                            <th>Reason</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>BSIT</td>
                                            <td>Medical Emergency</td>
                                            <td>2024-03-15</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary me-1">View</button>
                                                <button class="btn btn-sm btn-outline-success me-1">Approve</button>
                                                <button class="btn btn-sm btn-outline-danger">Reject</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jane Smith</td>
                                            <td>BSCS</td>
                                            <td>Family Emergency</td>
                                            <td>2024-03-14</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mike Johnson</td>
                                            <td>BSIT</td>
                                            <td>Academic Conflict</td>
                                            <td>2024-03-13</td>
                                            <td><span class="badge bg-danger">Rejected</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white py-3">
                            <nav aria-label="Page navigation">
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

                <!-- Announcements Panel -->
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Latest Announcements</h5>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newAnnouncementModal">
                                <i class="bi bi-plus-lg"></i> New
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="announcement-card p-3 mb-3 bg-light">
                                <h6 class="mb-1">Deadline Reminder</h6>
                                <p class="mb-1 text-muted small">Reminder: Deadline for Special Exam Request Filing is May 31, 2025</p>
                                <small class="text-muted">Posted: March 15, 2024</small>
                            </div>
                            <div class="announcement-card p-3 mb-3 bg-light">
                                <h6 class="mb-1">System Maintenance</h6>
                                <p class="mb-1 text-muted small">The system will be under maintenance on March 20, 2024 from 10 PM to 2 AM.</p>
                                <small class="text-muted">Posted: March 14, 2024</small>
                            </div>
                            <div class="announcement-card p-3 bg-light">
                                <h6 class="mb-1">New Features</h6>
                                <p class="mb-1 text-muted small">New features have been added to the system. Check the updates page for details.</p>
                                <small class="text-muted">Posted: March 13, 2024</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- New Announcement Modal -->
    <div class="modal fade" id="newAnnouncementModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="announcementTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="announcementTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="announcementContent" class="form-label">Content</label>
                            <textarea class="form-control" id="announcementContent" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Post Announcement</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
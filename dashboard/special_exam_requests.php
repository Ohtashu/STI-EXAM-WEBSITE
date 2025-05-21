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
    <title>Special Exam Requests - SEMS</title>
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
        .table th {
            font-weight: 600;
            background-color: #f8f9fa;
        }
        .badge {
            padding: 0.5em 0.75em;
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        .filter-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .table-responsive {
            min-height: 400px;
        }
        .action-buttons .btn {
            margin: 0 2px;
        }
        .status-badge {
            min-width: 85px;
            text-align: center;
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
                <h2 class="text-primary mb-0">Special Exam Requests Management</h2>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>New Request
                </button>
            </div>

            <!-- Filter and Search Panel -->
            <div class="card filter-card mb-4">
                <div class="card-body p-4">
                    <form>
                        <div class="row g-3">
                            <!-- Status Filter -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="statusFilter" class="form-label">Filter by Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="all" selected>All</option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>

                            <!-- Course Filter -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="courseFilter" class="form-label">Filter by Course</label>
                                <select class="form-select" id="courseFilter">
                                    <option value="all" selected>All</option>
                                    <option value="BSCS">BSCS</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSEMC">BSEMC</option>
                                </select>
                            </div>

                            <!-- Semester Filter -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="semesterFilter" class="form-label">Filter by Semester</label>
                                <select class="form-select" id="semesterFilter">
                                    <option value="all" selected>All</option>
                                    <option value="1st">1st Semester</option>
                                    <option value="2nd">2nd Semester</option>
                                    <option value="summer">Summer</option>
                                </select>
                            </div>

                            <!-- Search Bar -->
                            <div class="col-12 col-md-6 col-lg-3">
                                <label for="searchInput" class="form-label">Search Student Name/ID</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Enter student name or ID...">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Filter Button -->
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-funnel-fill me-2"></i>Apply Filters
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Requests Table -->
            <div class="card">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="text-primary mb-0">All Special Exam Requests</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Student Name</th>
                                    <th>Student ID</th>
                                    <th>Course</th>
                                    <th>Subject</th>
                                    <th>Reason Type</th>
                                    <th>Date Submitted</th>
                                    <th>Supporting Docs</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Row 1 -->
                                <tr>
                                    <td>SEMS-001</td>
                                    <td>Sarah Concepcion</td>
                                    <td>STI-2022-00123</td>
                                    <td>BSIT</td>
                                    <td>Calculus 1</td>
                                    <td>Medical Certificate</td>
                                    <td>2024-03-15</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                        </a>
                                    </td>
                                    <td><span class="badge bg-warning text-dark status-badge">Pending</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white">View</button>
                                        <button class="btn btn-sm btn-success">Approve</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>

                                <!-- Sample Row 2 -->
                                <tr>
                                    <td>SEMS-002</td>
                                    <td>John Michael Santos</td>
                                    <td>STI-2022-00456</td>
                                    <td>BSCS</td>
                                    <td>Database Management</td>
                                    <td>Family Emergency</td>
                                    <td>2024-03-14</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                        </a>
                                    </td>
                                    <td><span class="badge bg-success status-badge">Approved</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white">View</button>
                                        <button class="btn btn-sm btn-success" disabled>Approve</button>
                                        <button class="btn btn-sm btn-danger" disabled>Reject</button>
                                    </td>
                                </tr>

                                <!-- Sample Row 3 -->
                                <tr>
                                    <td>SEMS-003</td>
                                    <td>Maria Garcia</td>
                                    <td>STI-2022-00789</td>
                                    <td>BSEMC</td>
                                    <td>Web Development</td>
                                    <td>Personal Matter</td>
                                    <td>2024-03-13</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                        </a>
                                    </td>
                                    <td><span class="badge bg-danger status-badge">Rejected</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white">View</button>
                                        <button class="btn btn-sm btn-success" disabled>Approve</button>
                                        <button class="btn btn-sm btn-danger" disabled>Reject</button>
                                    </td>
                                </tr>

                                <!-- Sample Row 4 -->
                                <tr>
                                    <td>SEMS-004</td>
                                    <td>James Wilson</td>
                                    <td>STI-2022-00234</td>
                                    <td>BSIT</td>
                                    <td>Programming 2</td>
                                    <td>Medical Certificate</td>
                                    <td>2024-03-12</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                        </a>
                                    </td>
                                    <td><span class="badge bg-warning text-dark status-badge">Pending</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white">View</button>
                                        <button class="btn btn-sm btn-success">Approve</button>
                                        <button class="btn btn-sm btn-danger">Reject</button>
                                    </td>
                                </tr>

                                <!-- Sample Row 5 -->
                                <tr>
                                    <td>SEMS-005</td>
                                    <td>Anna Lee</td>
                                    <td>STI-2022-00567</td>
                                    <td>BSCS</td>
                                    <td>Data Structures</td>
                                    <td>Family Emergency</td>
                                    <td>2024-03-11</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                        </a>
                                    </td>
                                    <td><span class="badge bg-success status-badge">Approved</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white">View</button>
                                        <button class="btn btn-sm btn-success" disabled>Approve</button>
                                        <button class="btn btn-sm btn-danger" disabled>Reject</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
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
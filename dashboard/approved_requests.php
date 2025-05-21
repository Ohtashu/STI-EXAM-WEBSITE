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
    <title>Approved Requests - SEMS</title>
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
        .student-name {
            font-weight: 500;
        }
        .student-id {
            color: #6c757d;
            font-size: 0.875rem;
        }
        .exam-venue {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .date-cell {
            white-space: nowrap;
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
                <h2 class="text-primary mb-0">Approved Special Exam Requests</h2>
            </div>

            <!-- Filter and Search Panel -->
            <div class="card filter-card mb-4">
                <div class="card-body p-4">
                    <form>
                        <div class="row g-3">
                            <!-- Search Bar -->
                            <div class="col-12 col-md-4">
                                <label for="searchInput" class="form-label">Search Student</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" id="searchInput" 
                                           placeholder="Enter student name or ID...">
                                </div>
                            </div>

                            <!-- Course Filter -->
                            <div class="col-12 col-md-2">
                                <label for="courseFilter" class="form-label">Filter by Course</label>
                                <select class="form-select" id="courseFilter">
                                    <option value="all" selected>All Courses</option>
                                    <option value="BSCS">BSCS</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSEMC">BSEMC</option>
                                    <option value="BSA">BSA</option>
                                    <option value="BSTM">BSTM</option>
                                </select>
                            </div>

                            <!-- Semester Filter -->
                            <div class="col-12 col-md-2">
                                <label for="semesterFilter" class="form-label">Filter by Semester</label>
                                <select class="form-select" id="semesterFilter">
                                    <option value="all" selected>All Semesters</option>
                                    <option value="1st">1st Semester</option>
                                    <option value="2nd">2nd Semester</option>
                                    <option value="summer">Summer</option>
                                </select>
                            </div>

                            <!-- Exam Date From -->
                            <div class="col-12 col-md-2">
                                <label for="dateFrom" class="form-label">Exam Date From</label>
                                <input type="date" class="form-control" id="dateFrom">
                            </div>

                            <!-- Exam Date To -->
                            <div class="col-12 col-md-2">
                                <label for="dateTo" class="form-label">Exam Date To</label>
                                <input type="date" class="form-control" id="dateTo">
                            </div>

                            <!-- Filter Button -->
                            <div class="col-12 col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-funnel-fill me-2"></i>Apply Filters
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Approved Requests Table -->
            <div class="card">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="text-primary mb-0">List of Approved Requests</h5>
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
                                    <th>Approved Date</th>
                                    <th>Exam Date</th>
                                    <th>Exam Venue</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Row 1 -->
                                <tr>
                                    <td>SEMS-005</td>
                                    <td>
                                        <div class="student-name">Daniel Ramos</div>
                                        <div class="student-id">STI-2021-00045</div>
                                    </td>
                                    <td>STI-2021-00045</td>
                                    <td>BSIT</td>
                                    <td>Discrete Math</td>
                                    <td>Medical Certificate</td>
                                    <td class="date-cell">2025-05-20</td>
                                    <td class="date-cell">2025-05-25</td>
                                    <td class="exam-venue">Room 301</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="View Alibi">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success" title="Pardon Payment">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 2 -->
                                <tr>
                                    <td>SEMS-008</td>
                                    <td>
                                        <div class="student-name">Sophia Lim</div>
                                        <div class="student-id">STI-2023-00102</div>
                                    </td>
                                    <td>STI-2023-00102</td>
                                    <td>BSEMC</td>
                                    <td>Web Development</td>
                                    <td>Official Business</td>
                                    <td class="date-cell">2025-05-18</td>
                                    <td class="date-cell">2025-05-28</td>
                                    <td class="exam-venue">Lab 205</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="View Alibi">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success" title="Pardon Payment">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 3 -->
                                <tr>
                                    <td>SEMS-012</td>
                                    <td>
                                        <div class="student-name">Chris Perez</div>
                                        <div class="student-id">STI-2022-00078</div>
                                    </td>
                                    <td>STI-2022-00078</td>
                                    <td>BSCS</td>
                                    <td>Operating Systems</td>
                                    <td>Valid Alibi</td>
                                    <td class="date-cell">2025-05-15</td>
                                    <td class="date-cell">2025-05-30</td>
                                    <td class="exam-venue">Auditorium A</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="View Alibi">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success" title="Pardon Payment">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 4 -->
                                <tr>
                                    <td>SEMS-015</td>
                                    <td>
                                        <div class="student-name">Maria Santos</div>
                                        <div class="student-id">STI-2022-00092</div>
                                    </td>
                                    <td>STI-2022-00092</td>
                                    <td>BSA</td>
                                    <td>Financial Accounting</td>
                                    <td>Medical Certificate</td>
                                    <td class="date-cell">2025-05-17</td>
                                    <td class="date-cell">2025-05-27</td>
                                    <td class="exam-venue">Room 205</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="View Alibi">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success" title="Pardon Payment">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 5 -->
                                <tr>
                                    <td>SEMS-018</td>
                                    <td>
                                        <div class="student-name">James Wilson</div>
                                        <div class="student-id">STI-2023-00035</div>
                                    </td>
                                    <td>STI-2023-00035</td>
                                    <td>BSTM</td>
                                    <td>Tourism Management</td>
                                    <td>Official Business</td>
                                    <td class="date-cell">2025-05-19</td>
                                    <td class="date-cell">2025-05-29</td>
                                    <td class="exam-venue">Conference Room B</td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="View Alibi">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success" title="Pardon Payment">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
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
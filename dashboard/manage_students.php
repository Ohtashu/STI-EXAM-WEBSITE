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
    <title>Manage Students - SEMS</title>
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
        .student-email {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
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
                <h2 class="text-primary mb-0">Student Management</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    <i class="bi bi-person-plus-fill me-2"></i>Add New Student
                </button>
            </div>

            <!-- Filter and Search Panel -->
            <div class="card filter-card mb-4">
                <div class="card-body p-4">
                    <form>
                        <div class="row g-3">
                            <!-- Search Bar -->
                            <div class="col-12 col-md-5">
                                <label for="searchInput" class="form-label">Search Student</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" id="searchInput" 
                                           placeholder="Enter student name, ID, or email...">
                                </div>
                            </div>

                            <!-- Course Filter -->
                            <div class="col-12 col-md-3">
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

                            <!-- Program Filter -->
                            <div class="col-12 col-md-2">
                                <label for="programFilter" class="form-label">Filter by Program</label>
                                <select class="form-select" id="programFilter">
                                    <option value="all" selected>All Programs</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="ENG">Engineering</option>
                                    <option value="ACC">Accountancy</option>
                                    <option value="TM">Tourism</option>
                                </select>
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

            <!-- Students Table -->
            <div class="card">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="text-primary mb-0">Registered Students</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Program</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Row 1 -->
                                <tr>
                                    <td>STI-2022-00001</td>
                                    <td>Liam Smith</td>
                                    <td>BSCS</td>
                                    <td>Computer Science</td>
                                    <td class="student-email">liam.smith@sti.edu</td>
                                    <td>09123456789</td>
                                    <td><span class="badge bg-success status-badge">Active</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Profile">
                                            <i class="bi bi-person-vcard"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 2 -->
                                <tr>
                                    <td>STI-2022-00002</td>
                                    <td>Emma Johnson</td>
                                    <td>BSIT</td>
                                    <td>Information Technology</td>
                                    <td class="student-email">emma.johnson@sti.edu</td>
                                    <td>09234567890</td>
                                    <td><span class="badge bg-success status-badge">Active</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Profile">
                                            <i class="bi bi-person-vcard"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 3 -->
                                <tr>
                                    <td>STI-2022-00003</td>
                                    <td>Noah Williams</td>
                                    <td>BSEMC</td>
                                    <td>Engineering</td>
                                    <td class="student-email">noah.williams@sti.edu</td>
                                    <td>09345678901</td>
                                    <td><span class="badge bg-secondary status-badge">Inactive</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Profile">
                                            <i class="bi bi-person-vcard"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 4 -->
                                <tr>
                                    <td>STI-2022-00004</td>
                                    <td>Olivia Brown</td>
                                    <td>BSA</td>
                                    <td>Accountancy</td>
                                    <td class="student-email">olivia.brown@sti.edu</td>
                                    <td>09456789012</td>
                                    <td><span class="badge bg-success status-badge">Active</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Profile">
                                            <i class="bi bi-person-vcard"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 5 -->
                                <tr>
                                    <td>STI-2022-00005</td>
                                    <td>William Davis</td>
                                    <td>BSTM</td>
                                    <td>Tourism</td>
                                    <td class="student-email">william.davis@sti.edu</td>
                                    <td>09567890123</td>
                                    <td><span class="badge bg-success status-badge">Active</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Profile">
                                            <i class="bi bi-person-vcard"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bi bi-trash-fill"></i>
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

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Student ID -->
                            <div class="col-md-6">
                                <label for="studentId" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="studentId" required>
                            </div>

                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" required>
                            </div>

                            <!-- Course -->
                            <div class="col-md-6">
                                <label for="course" class="form-label">Course</label>
                                <select class="form-select" id="course" required>
                                    <option value="">Select Course</option>
                                    <option value="BSCS">BSCS</option>
                                    <option value="BSIT">BSIT</option>
                                    <option value="BSEMC">BSEMC</option>
                                    <option value="BSA">BSA</option>
                                    <option value="BSTM">BSTM</option>
                                </select>
                            </div>

                            <!-- Program -->
                            <div class="col-md-6">
                                <label for="program" class="form-label">Program</label>
                                <select class="form-select" id="program" required>
                                    <option value="">Select Program</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="ENG">Engineering</option>
                                    <option value="ACC">Accountancy</option>
                                    <option value="TM">Tourism</option>
                                </select>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Student</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
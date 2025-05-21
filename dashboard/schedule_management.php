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
    <title>Schedule Management - SEMS</title>
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
            min-width: 100px;
            text-align: center;
        }
        .exam-venue {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .date-cell, .time-cell {
            white-space: nowrap;
        }
        .students-list {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .proctor-name {
            font-weight: 500;
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
                <h2 class="text-primary mb-0">Special Exam Schedule Management</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                    <i class="bi bi-calendar-plus-fill me-2"></i>Add New Schedule
                </button>
            </div>

            <!-- Filter and Search Panel -->
            <div class="card filter-card mb-4">
                <div class="card-body p-4">
                    <form>
                        <div class="row g-3">
                            <!-- Search Bar -->
                            <div class="col-12 col-md-4">
                                <label for="searchInput" class="form-label">Search Schedule/Student</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" id="searchInput" 
                                           placeholder="Enter schedule ID or student name/ID...">
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

                            <!-- Venue Filter -->
                            <div class="col-12 col-md-2">
                                <label for="venueFilter" class="form-label">Filter by Venue</label>
                                <select class="form-select" id="venueFilter">
                                    <option value="all" selected>All Venues</option>
                                    <option value="Room 301">Room 301</option>
                                    <option value="Lab 205">Lab 205</option>
                                    <option value="Auditorium A">Auditorium A</option>
                                    <option value="Online">Online</option>
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

            <!-- Scheduled Exams Table -->
            <div class="card">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="text-primary mb-0">List of Scheduled Special Exams</h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Schedule ID</th>
                                    <th>Exam Date</th>
                                    <th>Exam Time</th>
                                    <th>Course</th>
                                    <th>Subject</th>
                                    <th>Students</th>
                                    <th>Exam Venue</th>
                                    <th>Proctor</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Sample Row 1 -->
                                <tr>
                                    <td>SCH-001</td>
                                    <td class="date-cell">2025-06-01</td>
                                    <td class="time-cell">09:00 AM</td>
                                    <td>BSCS</td>
                                    <td>Data Structures</td>
                                    <td class="students-list">John Smith, Maria Garcia (2 students)</td>
                                    <td class="exam-venue">Room 301</td>
                                    <td class="proctor-name">Prof. Reyes</td>
                                    <td><span class="badge bg-primary status-badge">Scheduled</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Cancel">
                                            <i class="bi bi-calendar-x-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 2 -->
                                <tr>
                                    <td>SCH-002</td>
                                    <td class="date-cell">2025-06-02</td>
                                    <td class="time-cell">01:30 PM</td>
                                    <td>BSIT</td>
                                    <td>Networking</td>
                                    <td class="students-list">David Lee (1 student)</td>
                                    <td class="exam-venue">Lab 205</td>
                                    <td class="proctor-name">Mr. Tan</td>
                                    <td><span class="badge bg-success status-badge">Completed</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Cancel">
                                            <i class="bi bi-calendar-x-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 3 -->
                                <tr>
                                    <td>SCH-003</td>
                                    <td class="date-cell">2025-06-03</td>
                                    <td class="time-cell">10:00 AM</td>
                                    <td>BSEMC</td>
                                    <td>Web Development</td>
                                    <td class="students-list">Sarah Johnson, Mike Brown, Lisa Wong (3 students)</td>
                                    <td class="exam-venue">Online</td>
                                    <td class="proctor-name">Prof. Santos</td>
                                    <td><span class="badge bg-primary status-badge">Scheduled</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Cancel">
                                            <i class="bi bi-calendar-x-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 4 -->
                                <tr>
                                    <td>SCH-004</td>
                                    <td class="date-cell">2025-06-04</td>
                                    <td class="time-cell">02:00 PM</td>
                                    <td>BSA</td>
                                    <td>Financial Accounting</td>
                                    <td class="students-list">Emma Wilson (1 student)</td>
                                    <td class="exam-venue">Room 205</td>
                                    <td class="proctor-name">Prof. Cruz</td>
                                    <td><span class="badge bg-danger status-badge">Cancelled</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Cancel">
                                            <i class="bi bi-calendar-x-fill"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Sample Row 5 -->
                                <tr>
                                    <td>SCH-005</td>
                                    <td class="date-cell">2025-06-05</td>
                                    <td class="time-cell">09:30 AM</td>
                                    <td>BSTM</td>
                                    <td>Tourism Management</td>
                                    <td class="students-list">Alex Chen, Rachel Park (2 students)</td>
                                    <td class="exam-venue">Auditorium A</td>
                                    <td class="proctor-name">Mr. Martinez</td>
                                    <td><span class="badge bg-primary status-badge">Scheduled</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-info text-white" title="View Details">
                                            <i class="bi bi-info-circle-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" title="Cancel">
                                            <i class="bi bi-calendar-x-fill"></i>
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

    <!-- Add Schedule Modal -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
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

                            <!-- Subject -->
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" required>
                            </div>

                            <!-- Exam Date -->
                            <div class="col-md-6">
                                <label for="examDate" class="form-label">Exam Date</label>
                                <input type="date" class="form-control" id="examDate" required>
                            </div>

                            <!-- Exam Time -->
                            <div class="col-md-6">
                                <label for="examTime" class="form-label">Exam Time</label>
                                <input type="time" class="form-control" id="examTime" required>
                            </div>

                            <!-- Exam Venue -->
                            <div class="col-md-6">
                                <label for="venue" class="form-label">Exam Venue</label>
                                <select class="form-select" id="venue" required>
                                    <option value="">Select Venue</option>
                                    <option value="Room 301">Room 301</option>
                                    <option value="Lab 205">Lab 205</option>
                                    <option value="Auditorium A">Auditorium A</option>
                                    <option value="Online">Online</option>
                                </select>
                            </div>

                            <!-- Proctor -->
                            <div class="col-md-6">
                                <label for="proctor" class="form-label">Proctor</label>
                                <select class="form-select" id="proctor" required>
                                    <option value="">Select Proctor</option>
                                    <option value="Prof. Reyes">Prof. Reyes</option>
                                    <option value="Mr. Tan">Mr. Tan</option>
                                    <option value="Prof. Santos">Prof. Santos</option>
                                    <option value="Prof. Cruz">Prof. Cruz</option>
                                    <option value="Mr. Martinez">Mr. Martinez</option>
                                </select>
                            </div>

                            <!-- Students -->
                            <div class="col-12">
                                <label for="students" class="form-label">Select Students</label>
                                <select class="form-select" id="students" multiple required>
                                    <option value="John Smith">John Smith (BSCS)</option>
                                    <option value="Maria Garcia">Maria Garcia (BSCS)</option>
                                    <option value="David Lee">David Lee (BSIT)</option>
                                    <option value="Sarah Johnson">Sarah Johnson (BSEMC)</option>
                                    <option value="Mike Brown">Mike Brown (BSEMC)</option>
                                    <option value="Lisa Wong">Lisa Wong (BSEMC)</option>
                                    <option value="Emma Wilson">Emma Wilson (BSA)</option>
                                    <option value="Alex Chen">Alex Chen (BSTM)</option>
                                    <option value="Rachel Park">Rachel Park (BSTM)</option>
                                </select>
                                <div class="form-text">Hold Ctrl/Cmd to select multiple students</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Schedule</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
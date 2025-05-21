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
    <title>System Settings - SEMS</title>
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
        .card-header {
            background-color: #fff;
            border-bottom: none;
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #f8f9fa;
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
        .action-buttons .btn {
            margin: 0 2px;
        }
        .form-switch .form-check-input {
            width: 3em;
            height: 1.5em;
            margin-top: 0.25em;
        }
        .form-switch .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .form-label {
            font-weight: 500;
            color: #495057;
        }
        .table-responsive {
            min-height: 200px;
        }
        .settings-section {
            margin-bottom: 2rem;
        }
        .settings-section:last-child {
            margin-bottom: 0;
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
                <h2 class="text-primary mb-0">System Settings</h2>
            </div>

            <!-- General System Settings -->
            <div class="card settings-section">
                <div class="card-header pt-4 pb-0">
                    <h5 class="text-primary mb-0">General System Settings</h5>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="systemName" class="form-label">System Name</label>
                                    <input type="text" class="form-control" id="systemName" value="SEMS Admin Portal" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="academicYear" class="form-label">Current Academic Year</label>
                                    <select class="form-select" id="academicYear">
                                        <option value="2024-2025" selected>2024-2025</option>
                                        <option value="2025-2026">2025-2026</option>
                                        <option value="2023-2024">2023-2024</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="currentSemester" class="form-label">Current Semester</label>
                                    <select class="form-select" id="currentSemester">
                                        <option value="1st">1st Semester</option>
                                        <option value="2nd" selected>2nd Semester</option>
                                        <option value="summer">Summer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="notificationEmail" class="form-label">Default Notification Email</label>
                                    <input type="email" class="form-control" id="notificationEmail" 
                                           placeholder="notifications@sti.edu" value="notifications@sti.edu">
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill me-2"></i>Save General Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- User Account Management -->
            <div class="card settings-section">
                <div class="card-header pt-4 pb-0 d-flex justify-content-between align-items-center">
                    <h5 class="text-primary mb-0">Admin & Staff Accounts</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-person-plus-fill me-2"></i>Add New User
                    </button>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Admin User -->
                                <tr>
                                    <td>admin_user</td>
                                    <td>admin@sems.com</td>
                                    <td>Administrator</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info text-white" title="Reset Password">
                                            <i class="bi bi-key-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="Deactivate">
                                            <i class="bi bi-person-x-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Program Head -->
                                <tr>
                                    <td>program_head</td>
                                    <td>ph@sems.com</td>
                                    <td>Program Head</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info text-white" title="Reset Password">
                                            <i class="bi bi-key-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="Deactivate">
                                            <i class="bi bi-person-x-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Registrar Staff -->
                                <tr>
                                    <td>registrar_staff</td>
                                    <td>registrar@sems.com</td>
                                    <td>Registrar Staff</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info text-white" title="Reset Password">
                                            <i class="bi bi-key-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-success" title="Activate">
                                            <i class="bi bi-person-check-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Exam Coordinator -->
                                <tr>
                                    <td>exam_coordinator</td>
                                    <td>coordinator@sems.com</td>
                                    <td>Exam Coordinator</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info text-white" title="Reset Password">
                                            <i class="bi bi-key-fill"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary" title="Deactivate">
                                            <i class="bi bi-person-x-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Core System Configurations -->
            <div class="card settings-section">
                <div class="card-header pt-4 pb-0">
                    <h5 class="text-primary mb-0">Core System Configurations</h5>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="requestDeadline" class="form-label">Default Request Deadline (Days)</label>
                                    <input type="number" class="form-control" id="requestDeadline" value="7" min="1" max="30">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="minDocuments" class="form-label">Minimum Supporting Documents Required</label>
                                    <input type="number" class="form-control" id="minDocuments" value="1" min="1" max="5">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="emailNotificationsToggle" checked>
                                    <label class="form-check-label" for="emailNotificationsToggle">
                                        Enable Email Notifications for New Requests
                                    </label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="smsNotificationsToggle">
                                    <label class="form-check-label" for="smsNotificationsToggle">
                                        Enable SMS Notifications
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill me-2"></i>Save Configurations
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Your Account Settings -->
            <div class="card settings-section">
                <div class="card-header pt-4 pb-0">
                    <h5 class="text-primary mb-0">Your Account Settings</h5>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-key-fill me-2"></i>Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="newUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="newUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="newEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="newEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="newRole" class="form-label">Role</label>
                            <select class="form-select" id="newRole" required>
                                <option value="">Select Role</option>
                                <option value="administrator">Administrator</option>
                                <option value="program_head">Program Head</option>
                                <option value="registrar_staff">Registrar Staff</option>
                                <option value="exam_coordinator">Exam Coordinator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Initial Password</label>
                            <input type="password" class="form-control" id="newPassword" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
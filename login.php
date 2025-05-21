<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Auto-login for testing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['is_logged_in'] = true;
    $_SESSION['user_role'] = 'admin';
    $_SESSION['user_name'] = 'Admin User';
    header('Location: dashboard/admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEMS | Admin Login</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 90%;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .login-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .login-form {
            padding: 2rem;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #001f3f;
            border-color: #001f3f;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0,40,85,0.25);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h4 class="mb-0">SEMS | Admin Login</h4>
        </div>
        <div class="login-form">
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email/Username (Optional for testing)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (Optional for testing)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login (Test Mode)</button>
                </div>
                <div class="alert alert-info mt-3" role="alert">
                    <i class="bi bi-info-circle me-2"></i>Test Mode: No credentials required
                </div>
            </form>
            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none">Forgot password?</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
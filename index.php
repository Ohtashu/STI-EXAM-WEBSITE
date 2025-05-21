<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check login status from session
$is_logged_in = isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;

// Redirect based on login status and role
if ($is_logged_in && $user_role) {
    switch ($user_role) {
        case 'admin':
            header('Location: dashboard/admin.php');
            break;
        case 'student':
            header('Location: dashboard/student.php');
            break;
        case 'head':
            header('Location: dashboard/head.php');
            break;
        default:
            header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
exit; 
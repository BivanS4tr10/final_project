<?php
include 'config.php';

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

// Jika akun adalah admin dengan password khusus
if ($email == 'admin@admin.com' && $password == 'kucinggarong') {
    $_SESSION['user_id'] = 1; // ID statis untuk admin
    $_SESSION['role'] = 'admin';
    header('Location: admin.php');
    exit();
}

// Proses login untuk akun biasa
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    
    if ($user['role'] == 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: rental.php');
    }
} else {
    echo "Login gagal!";
}
?>

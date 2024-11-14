<?php
include 'config.php';

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Cek apakah akun dengan email tersebut sudah ada
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Email sudah terdaftar, silakan gunakan email lain.";
} else {
    // Hanya buat akun user biasa, bukan admin
    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'user')";
    if (mysqli_query($conn, $query)) {
        header('Location: login.php');
    } else {
        echo "Registrasi gagal, coba lagi.";
    }
}
?>

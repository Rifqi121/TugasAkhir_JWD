<?php
include "koneksi.php"; // Include your database connection

if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password'])) {
    $fullname = mysqli_real_escape_string($koneksi, $_POST['fullname']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash(mysqli_real_escape_string($koneksi, $_POST['password']), PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password) VALUES ('$fullname', '$email', '$password')";
    $register = mysqli_query($koneksi, $query);

    if ($register) {
        echo "<script>alert('Registration successful. Please login.'); window.location.href = 'index.php?page=login';</script>";
    } else {
        echo "<script>alert('Registration failed. Please try again.'); window.location.href = 'index.php?page=login';</script>";
    }
}
?>

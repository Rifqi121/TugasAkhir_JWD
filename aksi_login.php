<?php
session_start();
include "koneksi.php"; // Include your database connection

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $hashed_password = $user['password'];
    
        // Debugging: Print the hashed password
        echo "Hashed password: " . $hashed_password . "<br>";

        if (password_verify($password, $hashed_password)) {
            // Store user information in session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];

            // Redirect to the homepage or any other page
            header("Location: index.php?page=beranda");
            exit();
        } else {
            echo "<script>alert('Incorrect password.'); document.location = 'index.php?page=login';</script>";
        }
    } else {
        echo "<script>alert('No user found with that email.'); document.location = 'index.php?page=login';</script>";
    }
}
?>

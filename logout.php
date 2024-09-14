<?php
session_start();
session_destroy(); // Destroy the session
header("Location: index.php?page=login"); // Redirect to the login page
exit();
?>

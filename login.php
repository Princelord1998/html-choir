<?php
session_start();
include "dbconnect.php";

if(isset($_POST['submit'])) {
// Get form data
$username = $_POST['name'];
$password = $_POST['password'];
$hashed_password = hash('sha256', $password);
// Check if the user exists in the database
$sql = "SELECT * FROM user_password WHERE name = '$username' AND password = '$password'";
    if (isset($conn)) {
        $result = $conn->query($sql);
    }

if ($result->num_rows == 1) {
    $_SESSION['login'] = $username;
    header("Location: dashboard.php");
    exit();
// You may redirect to another page using header("Location: dashboard.php");
} else {
    $sql1 = "SELECT * FROM admin_password WHERE name = '$username' AND password = '$hashed_password'";
    if (isset($conn)) {
        $result1 = $conn->query($sql1);
    }

    if ($result1->num_rows == 1) {

        $_SESSION['name'] = $username;
        $_SESSION['alogin'] = $username;
        $row = $result1->fetch_assoc();

        header("Location: admin/dashboard.php");
        exit();
// You may redirect to another page using header("Location: dashboard.php");
    }
}
// Invalid username or password
echo "Invalid username or password.";
header("Location: index.php");
}
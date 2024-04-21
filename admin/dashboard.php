<?php
session_start();
include "../dbconnect.php";
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
<div class="document">
    <header class="header"><h1>Admin Dashboard</h1></header>
    <div class="profile-icon">
        <img src="../images/profile.png" class="img-fluid rounded-circle" alt="Profile Icon" width="50">
        <p><?php echo isset($_SESSION['name']) ? $_SESSION['name']: '';?></p>
    </div>
    <?php include('session_message.php'); ?>
    <nav style="margin-top: 90px">
        <ul>
            <li>
                <div class="dropdown">
                    <button class="dropbtn">Manage</button>
                    <div class="dropdown-content">
                        <a href="../logout.php">Logout</a>
                        <a href="update_form.php">Modify Admin Password</a>
                        <a href="update_user.php">Modify User Password</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="sidebar">
        <ul>
            <li><a href="dashboard.php" style="background-color: red">Home</a></li>
            <li><a href="add_audio.php">Add Audio</a></li>
            <li><a href="alto.php">Alto</a></li>
            <li><a href="bass.php">Bass</a></li>
            <li><a href="soprano.php">Soprano</a></li>
            <li><a href="unisson.php">Unisson</a></li>
            <li><a href="tenor.php">Tenor</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name']: '';?>!</h2>
        <div class="userCount-container">
            <h2>TENOR</h2>
            <?php
                $query = "SELECT * FROM tenor";
                if (isset($conn)) {
                    $query_run = mysqli_query($conn, $query);
                }
                $tenor_count = 0;

                if(mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {
                        $tenor_count++;
                    }
                }
            ?>

            <?php
            $query = "SELECT * FROM soprano";
            if (isset($conn)) {
                $query_run = mysqli_query($conn, $query);
            }
            $soprano_count = 0;

            if(mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
                    $soprano_count++;
                }
            }
            ?>

            <?php
            $query = "SELECT * FROM alto";
            if (isset($conn)) {
                $query_run = mysqli_query($conn, $query);
            }
            $alto_count = 0;

            if(mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
                    $alto_count++;
                }
            }
            ?>

            <?php
            $query = "SELECT * FROM bass";
            if (isset($conn)) {
                $query_run = mysqli_query($conn, $query);
            }
            $bass_count = 0;

            if(mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
                    $bass_count++;
                }
            }
            ?>

            <?php
            $query = "SELECT * FROM unisson";
            if (isset($conn)) {
                $query_run = mysqli_query($conn, $query);
            }
            $unisson_count = 0;

            if(mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
                    $unisson_count++;
                }
            }
            ?>

            <p><?php echo isset($tenor_count)? $tenor_count : '0' ?></p>
        </div>
        <div class="userCount-container">
            <h2>ALTO</h2>
            <p><?php echo isset($alto_count)? $alto_count : '0' ?></p>
        </div>
        <div class="userCount-container">
            <h2>SOPRANO</h2>
            <p><?php echo isset($soprano_count)? $soprano_count : '0' ?></p>
        </div>
        <div class="userCount-container">
            <h2>BASS</h2>
            <p><?php echo isset($bass_count)? $bass_count : '0' ?></p>
        </div>
        <div class="userCount-container">
            <h2>UNISSON</h2>
            <p><?php echo isset($unisson_count)? $unisson_count : '0' ?></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="function.js"></script>
</body>
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Our Choir. All rights reserved.</p>
    </div>
</footer>
</html>


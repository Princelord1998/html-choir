<?php
session_start();
include "../dbconnect.php";
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
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
    <nav>
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
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="add_audio.php">Add Audio</a></li>
            <li><a href="alto.php">Alto</a></li>
            <li><a href="bass.php">Bass</a></li>
            <li><a href="soprano.php">Soprano</a></li>
            <li><a href="unisson.php" style="background-color: red">Unisson</a></li>
            <li><a href="tenor.php">Tenor</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Chant Unisson</h1>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM unisson";
            if (isset($conn)) {
                $query_run = mysqli_query($conn, $query);
            }
            $user_count = 0;

            if(mysqli_num_rows($query_run) > 0)
            {
                $counter = 0;
                foreach($query_run as $user)
                {
                    $user_count++;
                    $counter++;
                    ?>
                    <tr>
                        <td><?= $counter; ?></td>
                        <td><?= $user['title']; ?></td>
                        <td><?= $user['type']; ?></td>
                        <td>
                            <audio controls style="height: 25px">
                                <source src="../unisson_audio/<?= $user['title']; ?>" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                            <a href="unisson_edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <form action="../action.php" method="POST" class="d-inline">
                                <button onclick="window.confirm('Are you sure you wanna delete audio?')" style="width: 60px" type="submit" name="delete_unisson" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php

                }
            }
            else
            {
                echo "<h5> No Unisson Audio Found </h5>";
            }
            ?>

            </tbody>
        </table>
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


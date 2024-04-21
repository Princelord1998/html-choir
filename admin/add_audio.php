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
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="add_audio.php" style="background-color: red">Add Audio</a></li>
            <li><a href="alto.php">Alto</a></li>
            <li><a href="bass.php">Bass</a></li>
            <li><a href="soprano.php">Soprano</a></li>
            <li><a href="unisson.php">Unisson</a></li>
            <li><a href="tenor.php">Tenor</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="form-container">
            <h2>Upload Audio</h2>
            <form action="../action.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category">Pupitre:</label>
                    <select name="category" id="category" required>
                        <option value="">Select a category</option>
                        <option value="tenor">Tenor</option>
                        <option value="bass">Bass</option>
                        <option value="alto">Alto</option>
                        <option value="soprano">Soprano</option>
                        <option value="unisson">Unisson</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category1">Partie de la Messe:</label>
                    <select name="category1" id="category1" required>
                        <option value="">Select a category</option>
                        <option value="entrée">Entrée</option>
                        <option value="kyrié">Kyrié</option>
                        <option value="gloria">Gloria</option>
                        <option value="psaume">Psaume</option>
                        <option value="acclamation">Acclamation</option>
                        <option value="sanctus">Sanctus</option>
                        <option value="agneus_dei">Agneus Dei</option>
                        <option value="offertoire">Offertoire</option>
                        <option value="communion">Communion</option>
                        <option value="action_de_grace">Action De Grace</option>
                        <option value="meditation">Meditation</option>
                        <option value="sortie">Sortie</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="audioFile">Audio File:</label>
                    <input type="file" name="audioFile" id="audioFile" accept="audio/*" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Upload Audio" name="add">
                </div>
            </form>
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


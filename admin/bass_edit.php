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
            <li><a href="bass.php" style="background-color: red">Bass</a></li>
            <li><a href="soprano.php">Soprano</a></li>
            <li><a href="unisson.php">Unisson</a></li>
            <li><a href="tenor.php">Tenor</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="form-container">
            <h2>Edit Bass</h2>

            <?php
            if(isset($_GET['id']))
            {
                if (isset($conn)) {
                    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                }
                $query = "SELECT * FROM bass WHERE id='$user_id' ";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    $user_id = mysqli_fetch_array($query_run);
                    ?>
                    <form action="../action.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?= $user_id['id']; ?>">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="name" value="<?=$user_id['title'];?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category">Pupitre:</label>
                            <select name="update_category" id="update_category" required>
                                <option value="">Select a category</option>
                                <option value="tenor">Tenor</option>
                                <option value="bass" selected>Bass</option>
                                <option value="alto">Alto</option>
                                <option value="soprano">Soprano</option>
                                <option value="unisson">Unisson</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category1">Partie de la Messe:</label>
                            <select name="update_category1" id="update_category1" required>
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
                            <input type="submit" value="Edit Audio" name="update_bass">
                        </div>

                    </form>
                    <?php
                }
                else
                {
                    echo "<h4>No Bass Audio Found</h4>";
                }
            }
            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../functions.js"></script>
</body>
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Our Choir. All rights reserved.</p>
    </div>
</footer>
</html>



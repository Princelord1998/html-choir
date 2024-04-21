<?php
session_start();
include "dbconnect.php";

// Function to delete a given audio file from a folder
function deleteAudioFile($folderPath, $fileName) {
    // Construct the full path to the audio file
    $filePath = $folderPath . '/' . $fileName;

    // Check if the file exists
    if (file_exists($filePath)) {
        // Attempt to delete the file
        if (unlink($filePath)) {
            return true;
        }
    }
    return false;
}

// Function to rename a given audio file in a folder
function renameAudioFile($folderPath, $oldFileName, $newFileName) {
    // Construct the full paths to the old and new audio files
    $oldFilePath = $folderPath . '/' . $oldFileName;
    $newFilePath = $folderPath . '/' . $newFileName;

    // Check if the old file exists
    if (file_exists($oldFilePath)) {
        // Attempt to rename the file
        if (rename($oldFilePath, $newFilePath)) {
            return true;
        }
    }
    return false;
}

if(isset($_POST['delete_tenor']))
{
   if(true){
       if (isset($conn)) {
           $user_id = mysqli_real_escape_string($conn, $_POST['delete_tenor']);
       }
       $query1 = "SELECT title FROM tenor WHERE id='$user_id' ";
       $query_run1 = mysqli_query($conn, $query1);
       if(mysqli_num_rows($query_run1) == 1){
           foreach ($query_run1 as $audio)
               $file_name = $audio['title'];
       }
       $query = "DELETE FROM tenor WHERE id='$user_id' ";
       $query_run = mysqli_query($conn, $query);

       $delete_audio = deleteAudioFile('tenor_audio', $file_name);
       if($query_run && $delete_audio)
       {
           $_SESSION['message'] = "Audio deleted Successfully";
           header("Location: admin/tenor.php");
           exit(0);
       }
       else
       {
           $_SESSION['message'] = "Audio Not Deleted".$file_name;
           header("Location: admin/tenor.php");
           exit(0);
       }
   }else{
       $_SESSION['message'] = "An error occurred";
       header("Location: admin/tenor.php");
       exit(0);
   }
}

if(isset($_POST['delete_bass']))
{
    if(true){
        if (isset($conn)) {
            $user_id = mysqli_real_escape_string($conn, $_POST['delete_bass']);
        }
        $query1 = "SELECT title FROM bass WHERE id='$user_id' ";
        $query_run1 = mysqli_query($conn, $query1);
        if(mysqli_num_rows($query_run1) == 1){
            foreach ($query_run1 as $audio)
                $file_name = $audio['title'];
        }
        $query = "DELETE FROM bass WHERE id='$user_id' ";
        $query_run = mysqli_query($conn, $query);

        $delete_audio = deleteAudioFile('bass_audio', $file_name);
        if($query_run && $delete_audio)
        {
            $_SESSION['message'] = "Audio deleted Successfully";
            header("Location: admin/bass.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Audio Not Deleted";
            header("Location: admin/bass.php");
            exit(0);
        }
    }else{
        $_SESSION['message'] = "An error occurred";
        header("Location: admin/bass.php");
        exit(0);
    }
}

if(isset($_POST['delete_alto']))
{
    if(true){
        if (isset($conn)) {
            $user_id = mysqli_real_escape_string($conn, $_POST['delete_alto']);
        }
        $query1 = "SELECT title FROM alto WHERE id='$user_id' ";
        $query_run1 = mysqli_query($conn, $query1);
        if(mysqli_num_rows($query_run1) == 1){
            foreach ($query_run1 as $audio)
                $file_name = $audio['title'];
        }
        $query = "DELETE FROM alto WHERE id='$user_id' ";
        $query_run = mysqli_query($conn, $query);

        $delete_audio = deleteAudioFile('alto_audio', $file_name);
        if($query_run && $delete_audio)
        {
            $_SESSION['message'] = "Audio deleted Successfully";
            header("Location: admin/alto.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Audio Not Deleted";
            header("Location: admin/alto.php");
            exit(0);
        }
    }else{
        $_SESSION['message'] = "An error occurred";
        header("Location: admin/alto.php");
        exit(0);
    }
}

if(isset($_POST['delete_soprano']))
{
    if(true){
        if (isset($conn)) {
            $user_id = mysqli_real_escape_string($conn, $_POST['delete_soprano']);
        }
        $query1 = "SELECT title FROM soprano WHERE id='$user_id' ";
        $query_run1 = mysqli_query($conn, $query1);
        if(mysqli_num_rows($query_run1) == 1){
            foreach ($query_run1 as $audio)
                $file_name = $audio['title'];
        }
        $query = "DELETE FROM soprano WHERE id='$user_id' ";
        $query_run = mysqli_query($conn, $query);

        $delete_audio = deleteAudioFile('soprano_audio', $file_name);
        if($query_run && $delete_audio)
        {
            $_SESSION['message'] = "Audio deleted Successfully";
            header("Location: admin/soprano.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Audio Not Deleted";
            header("Location: admin/soprano.php");
            exit(0);
        }
    }else{
        $_SESSION['message'] = "An error occurred";
        header("Location: admin/soprano.php");
        exit(0);
    }
}

if(isset($_POST['delete_unisson']))
{
    if(true){
        if (isset($conn)) {
            $user_id = mysqli_real_escape_string($conn, $_POST['delete_unisson']);
        }
        $query1 = "SELECT title FROM unisson WHERE id='$user_id' ";
        $query_run1 = mysqli_query($conn, $query1);
        if(mysqli_num_rows($query_run1) == 1){
            foreach ($query_run1 as $audio)
                $file_name = $audio['title'];
        }
        $query = "DELETE FROM unisson WHERE id='$user_id' ";
        $query_run = mysqli_query($conn, $query);

        $delete_audio = deleteAudioFile('unisson_audio', $file_name);
        if($query_run && $delete_audio)
        {
            $_SESSION['message'] = "Audio deleted Successfully";
            header("Location: admin/unisson.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Audio Not Deleted";
            header("Location: admin/unisson.php");
            exit(0);
        }
    }else{
        $_SESSION['message'] = "An error occurred";
        header("Location: admin/unisson.php");
        exit(0);
    }
}

if(isset($_POST['update_tenor']))
{
    if (isset($conn)) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    }

    $query1 = "SELECT title FROM tenor WHERE id='$user_id' ";
    $query_run1 = mysqli_query($conn, $query1);
    if(mysqli_num_rows($query_run1) == 1){
        foreach ($query_run1 as $audio)
            $old_name = $audio['title'];
    }

    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['update_category1']);

    $query = "UPDATE tenor SET title='$new_name', type='$type' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    $renamed = renameAudioFile('tenor_audio', $old_name, $new_name);
    if($query_run && $renamed)
    {
        $_SESSION['message'] = "Audio Updated Successfully";
        header("Location: admin/tenor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Audio Not Updated";
        header("Location: admin/tenor.php");
        exit(0);
    }

}

if(isset($_POST['update_alto']))
{
    if (isset($conn)) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    }

    $query1 = "SELECT title FROM alto WHERE id='$user_id' ";
    $query_run1 = mysqli_query($conn, $query1);
    if(mysqli_num_rows($query_run1) == 1){
        foreach ($query_run1 as $audio)
            $old_name = $audio['title'];
    }

    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['update_category1']);

    $query = "UPDATE alto SET title='$new_name', type='$type' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    $renamed = renameAudioFile('alto_audio', $old_name, $new_name);
    if($query_run && $renamed)
    {
        $_SESSION['message'] = "Audio Updated Successfully";
        header("Location: admin/alto.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Audio Not Updated";
        header("Location: admin/alto.php");
        exit(0);
    }

}

if(isset($_POST['update_soprano']))
{
    if (isset($conn)) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    }

    $query1 = "SELECT title FROM soprano WHERE id='$user_id' ";
    $query_run1 = mysqli_query($conn, $query1);
    if(mysqli_num_rows($query_run1) == 1){
        foreach ($query_run1 as $audio)
            $old_name = $audio['title'];
    }

    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['update_category1']);

    $query = "UPDATE soprano SET title='$new_name', type='$type' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    $renamed = renameAudioFile('soprano_audio', $old_name, $new_name);
    if($query_run && $renamed)
    {
        $_SESSION['message'] = "Audio Updated Successfully";
        header("Location: admin/soprano.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Audio Not Updated";
        header("Location: admin/soprano.php");
        exit(0);
    }

}

if(isset($_POST['update_unisson']))
{
    if (isset($conn)) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    }

    $query1 = "SELECT title FROM unisson WHERE id='$user_id' ";
    $query_run1 = mysqli_query($conn, $query1);
    if(mysqli_num_rows($query_run1) == 1){
        foreach ($query_run1 as $audio)
            $old_name = $audio['title'];
    }

    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['update_category1']);

    $query = "UPDATE unisson SET title='$new_name', type='$type' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    $renamed = renameAudioFile('unisson_audio', $old_name, $new_name);
    if($query_run && $renamed)
    {
        $_SESSION['message'] = "Audio Updated Successfully";
        header("Location: admin/unisson.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Audio Not Updated";
        header("Location: admin/unisson.php");
        exit(0);
    }

}

if(isset($_POST['update_bass']))
{
    if (isset($conn)) {
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    }

    $query1 = "SELECT title FROM bass WHERE id='$user_id' ";
    $query_run1 = mysqli_query($conn, $query1);
    if(mysqli_num_rows($query_run1) == 1){
        foreach ($query_run1 as $audio)
            $old_name = $audio['title'];
    }

    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['update_category1']);

    $query = "UPDATE bass SET title='$new_name', type='$type' WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    $renamed = renameAudioFile('bass_audio', $old_name, $new_name);
    if($query_run && $renamed)
    {
        $_SESSION['message'] = "Audio Updated Successfully";
        header("Location: admin/bass.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Audio Not Updated";
        header("Location: admin/bass.php");
        exit(0);
    }

}

// project begins here

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == 0) {
        $type = $_POST['category'];
        $category = $_POST['category1'];

        if($type=='tenor'){
            $table = 'tenor';
            $targetDir = "tenor_audio/";
        }else if($type=='alto'){
            $table = 'alto';
            $targetDir = "alto_audio/";
        }else if($type=='soprano'){
            $table = 'soprano';
            $targetDir = "tsoprano_audio/";
        }else if($type=='bass'){
            $table = 'bass';
            $targetDir = "bass_audio/";
        }else{
            $table = 'unisson';
            $targetDir = "unisson_audio/";
        }
        $targetFile = $targetDir . basename($_FILES["audioFile"]["name"]);
        $title = basename($_FILES["audioFile"]["name"]);

        $sql = "INSERT INTO $table (title, type) VALUES ('$title', '$category')";

        if (isset($conn)) {
            if ($conn->query($sql) === TRUE) {
                if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFile)) {
                    $_SESSION['message'] = "Audio uploaded successfully.";
                    header("Location:admin/add_audio.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "Error:".$conn->error;
                header("Location:admin/add_audio.php");
                exit();
            }
        }

    } else {
        echo "Error: No file uploaded.";
    }
}

// Close connection
$conn->close();

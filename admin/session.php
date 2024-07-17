<?php
session_start(); 
include('dbcon.php'); // Include the database connection

// Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || trim($_SESSION['id']) == '') {
    ?>
    <script>
        window.location = "index.php";
    </script>
    <?php
    exit(); // Ensure the script exits if the session is not set
}

$session_id = $_SESSION['id'];

// Perform a database query to retrieve user information
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$session_id'") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($user_query);

// Retrieve the username from the user row
$user_username = $user_row['username'];
?>

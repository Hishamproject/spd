<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'u512651245_root');
define('DB_PASS', '@Sdp12345'); // Use the password for the new MySQL user
define('DB_NAME', 'u512651245_capstone');

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

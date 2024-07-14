<?php
include('dbcon.php'); // Include your database connection file
include('session.php'); // Include your session management file

// Query to fetch student's quiz time
$sql = mysqli_query($conn, "SELECT * FROM student_class_quiz WHERE student_id = '$session_id'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($sql);
$quiz_time = $row['student_quiz_time'];

// Query to fetch class quiz time (assuming you need to fetch a specific quiz time)
$sqlp = mysqli_query($conn, "SELECT * FROM class_quiz") or die(mysqli_error($conn));
$rowp = mysqli_fetch_array($sqlp);

// Check if quiz time is within valid range and update if necessary
if ($quiz_time <= $rowp['quiz_time'] && $quiz_time > 0) {
    mysqli_query($conn, "UPDATE student_class_quiz SET student_quiz_time = student_quiz_time - 1 WHERE student_id = '$session_id'") or die(mysqli_error($conn));

    // Calculate remaining time in minutes and seconds
    $init = $quiz_time;
    $minutes = floor(($init / 60) % 60);
    $seconds = $init % 60;

    // Display remaining time based on seconds and minutes
    if ($init >= 60) {
        echo "$minutes minutes and $seconds seconds";
    } else {
        echo "$seconds seconds";
    }
} else {
    // If quiz time is not within the valid range, handle this case as per your application's logic
    // Example: $_SESSION['take_exam'] = 'denied';
    echo "Quiz time has expired or is invalid"; // Provide appropriate feedback to the user
}
?>

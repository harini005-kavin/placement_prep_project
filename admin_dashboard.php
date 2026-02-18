<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($result);

if($user['role'] != 'admin'){
    echo "Access Denied!";
    exit();
}
?>

<h2>Admin Dashboard</h2>

<a href="view_users.php">View Users</a><br><br>
<a href="view_scores.php">View Scores</a><br><br>
<a href="add_question.php">Add Question</a><br><br>
<a href="logout.php">Logout</a>

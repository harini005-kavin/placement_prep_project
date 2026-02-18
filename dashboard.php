
<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">

<h2>Welcome <?php echo $_SESSION['name']; ?> 🎉</h2>

<hr>

<h3>What would you like to do?</h3>

<a href="take_test.php">Take Aptitude Test</a><br><br>
<a href="leaderboard.php">Leaderboard</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>


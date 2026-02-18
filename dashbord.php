<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">

<h2>Welcome <?php echo $_SESSION['name']; ?> 🎉</h2>

<hr>

<a href="take_test.php">Take Aptitude Test</a><br><br>
<a href="leaderboard.php">Leaderboard</a><br><br>
<a href="logout.php">Logout</a>

</div>

</body>
</html>

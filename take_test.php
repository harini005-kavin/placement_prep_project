<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Take Test</title>
</head>
<body>
<div class="container">
<h2>Aptitude Test</h2>

<form method="POST" action="result.php">

<?php
while($row = mysqli_fetch_assoc($result)) {
?>
    <p><b><?php echo $row['question']; ?></b></p>

    <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option1']; ?>"> <?php echo $row['option1']; ?><br>
    <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option2']; ?>"> <?php echo $row['option2']; ?><br>
    <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option3']; ?>"> <?php echo $row['option3']; ?><br>
    <input type="radio" name="answer[<?php echo $row['id']; ?>]" value="<?php echo $row['option4']; ?>"> <?php echo $row['option4']; ?><br><br>
<?php
}
?>

<button type="submit">Submit Test</button>

</form>

</body>
</html>

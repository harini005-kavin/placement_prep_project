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

$scores = mysqli_query($conn, "
    SELECT scores.id, users.name, scores.score, scores.taken_at
    FROM scores
    JOIN users ON scores.user_id = users.id
");
?>

<h2>All Scores</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Score</th>
    <th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($scores)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['score']; ?></td>
    <td><?php echo $row['taken_at']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="admin_dashboard.php">Back</a>

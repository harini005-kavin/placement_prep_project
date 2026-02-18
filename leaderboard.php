<?php
include("config/db.php");

$result = mysqli_query($conn, "
    SELECT users.name, MAX(scores.score) as best_score
    FROM scores
    JOIN users ON scores.user_id = users.id
    GROUP BY users.id
    ORDER BY best_score DESC
");
?>

<h2>Leaderboard</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Rank</th>
    <th>Name</th>
    <th>Best Score</th>
</tr>

<?php 
$rank = 1;
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $rank++; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['best_score']; ?></td>
</tr>
<?php } ?>
</table>


<?php

session_start();
include("config/db.php");

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$score = 0;

$result = mysqli_query($conn, "SELECT * FROM questions");
$total_questions = mysqli_num_rows($result);

if ($total_questions > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        $question_id = $row['id'];

        if (isset($_POST['answer'][$question_id]) && 
            $_POST['answer'][$question_id] == $row['correct_option']) {
            
            $score++;
        }
    }

    $percentage = ($score / $total_questions) * 100;

} else {
    $percentage = 0;
}

?> <!-- Close PHP before HTML -->

<h3>Your Score: <?php echo $score; ?> / <?php echo $total_questions; ?></h3>
<h3>Your Percentage: <?php echo round($percentage, 2); ?>%</h3>

<a href="dashboard.php">Back to Dashboard</a>

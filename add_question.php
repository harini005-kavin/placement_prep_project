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

if(isset($_POST['add'])){

    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct = $_POST['correct'];

    $sql = "INSERT INTO questions 
            (question, option1, option2, option3, option4, correct_option)
            VALUES
            ('$question','$option1','$option2','$option3','$option4','$correct')";

    if(mysqli_query($conn,$sql)){
        echo "Question Added Successfully!";
    } else {
        echo "Error!";
    }
}
?>

<h2>Add New Question</h2>

<form method="POST">
    Question:<br>
    <textarea name="question" required></textarea><br><br>

    Option 1: <input type="text" name="option1" required><br><br>
    Option 2: <input type="text" name="option2" required><br><br>
    Option 3: <input type="text" name="option3" required><br><br>
    Option 4: <input type="text" name="option4" required><br><br>

    Correct Answer:
    <input type="text" name="correct" required><br><br>

    <button type="submit" name="add">Add Question</button>
</form>

<br>
<a href="admin_dashboard.php">Back</a>

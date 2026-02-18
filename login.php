<?php
session_start();
include("config/db.php");

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
if($user['role'] == 'admin'){
    header("Location: admin_dashboard.php");
} else {
    header("Location: dashboard.php");
}
exit();

            exit();
        } else {
            echo "Wrong Password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Login</title>
</head>
<body>

<div class="container">

<h2>Student Login</h2>

<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>

</div>
</form>

</body>
</html>

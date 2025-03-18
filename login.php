<?php
include 'db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="login-page text-center">
    <div class="login-container ">
        <h2 class="mt-5">Employee Management System</h2>
        <form method="post" class="mt-4">
            <input type="text" name="username" class="form-control" placeholder="Username" required><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="text-danger"><?= isset($error) ? $error : '' ?></p>
    </div>
</body>
</html>

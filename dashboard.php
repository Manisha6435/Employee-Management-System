<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="dashboard-page text-center">
    <div class="welcome-box">
        <h2 class="welcome-text"><b><center>Welcome, <?= $_SESSION['username'] ?></b>
        <p>Role: <?= $_SESSION['role'] ?></p>

        <?php if ($_SESSION['role'] == 'HR'): ?></center></h2>
         <br><br> <a href="add.php" class="btn btn-success">Add Employee</a>
            <a href="view.php" class="btn btn-primary">View Employees</a>
        <?php else: ?>
            <a href="view.php" class="btn btn-primary">View Employees</a>
        <?php endif; ?>


        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>

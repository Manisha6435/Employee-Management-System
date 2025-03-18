<?php
include 'db_connect.php';
session_start();

if ($_SESSION['role'] !== 'HR') {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    // Handle image upload
    $image = "";
    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    $sql = "INSERT INTO employees (name, email, position, salary, image) VALUES ('$name', '$email', '$position', '$salary', '$image')";
    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="form-page">

   <div class="form-box">
    <h2>Add Employee</h2>
    <form action="add.php" method="POST" enctype="multipart/form-data">
<label for="image">Profile photo:</label>
        <input type="file" name="image" required>
<br>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
<br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
<br>
        <label for="position">Position:</label>
        <input type="text" name="position" required><br>

        <label for="salary">Salary:</label>
        <input type="number" name="salary" required>


        <button type="submit">Add Employee</button>
    </form>
</div>

</body>
</html>

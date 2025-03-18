<?php
include 'db_connect.php';
session_start();

if ($_SESSION['role'] !== 'HR') {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];
$employee = $conn->query("SELECT * FROM employees WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $image = $employee['image'];
    if ($_FILES['image']['name']) {
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }

    $sql = "UPDATE employees SET name='$name', email='$email', position='$position', salary='$salary', image='$image' WHERE id=$id";
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
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="edit-page">

    <div class="edit-employee-form">
        <h2>Edit Employee</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" class="form-control" value="<?= $employee['name'] ?>" required><br>
            <input type="email" name="email" class="form-control" value="<?= $employee['email'] ?>" required><br>
            <input type="text" name="position" class="form-control" value="<?= $employee['position'] ?>" required><br>
            <input type="number" name="salary" class="form-control" value="<?= $employee['salary'] ?>" required><br>
            <label>Profile Image:</label>
            <input type="file" name="image" class="form-control"><br>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</body>
</html>

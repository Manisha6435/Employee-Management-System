<?php
include 'db_connect.php';
session_start();

$result = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="view-page text-center">

    <div class="employee-list-container">
    <h1 class="employee-list-heading">Employee List</h1>
    
    <table class="employee-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        <?php
        include 'db_connect.php';
        $result = $conn->query("SELECT * FROM employees");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['position']}</td>";
            echo "<td>{$row['salary']}</td>";
            echo "<td><img src='{$row['image']}' width='50'></td>";
            echo "<td>
                    <a href='edit.php?id={$row['id']}' class='edit-btn'>Edit</a> 
                    <a href='delete.php?id={$row['id']}' class='delete-btn'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

          </div><a href="dashboard.php" class="back-btn">Back</a>

</body>
</html>

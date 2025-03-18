<?php
include 'db_connect.php';
session_start();

if ($_SESSION['role'] !== 'HR') {
    header("Location: dashboard.php");
    exit();
}

$id = $_GET['id'];

// Delete the employee
$conn->query("DELETE FROM employees WHERE id = $id");

// Reorder IDs after deletion
$conn->query("SET @num = 0;");
$conn->query("UPDATE employees SET id = @num := (@num + 1);");
$conn->query("ALTER TABLE employees AUTO_INCREMENT = 1;");

header("Location: view.php");
?>

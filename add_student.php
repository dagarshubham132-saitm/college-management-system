<?php
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $course = $_POST['course'];
    $email = $_POST['email'];

    $stmt = mysqli_prepare($conn,
        "INSERT INTO students (name, roll_no, course, email)
         VALUES (?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "ssss",
        $name, $roll, $course, $email);

    if (mysqli_stmt_execute($stmt)) {
        $message = "Student added successfully!";
    } else {
        $message = "Unable to add student.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-box">

<h2>Add New Student</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST">

    <input type="text" name="name"
    placeholder="Student Name" required>

    <input type="text" name="roll"
    placeholder="Roll Number" required>

    <input type="text" name="course"
    placeholder="Course Name" required>

    <input type="email" name="email"
    placeholder="Email Address" required>

    <button type="submit" name="add">
        Add Student
    </button>

</form>

<a href="dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>
<?php
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h1>College Dashboard</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
</header>

<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_student.php">Add Student</a>
    <a href="students.php">View Students</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="container">

    <h2>Welcome to Your Dashboard!</h2>

    <div class="cards">

        <div class="card">
            <h3>Add Student</h3>
            <p>Register new students.</p>
            <a href="add_student.php">Open</a>
        </div>

        <div class="card">
            <h3>View Students</h3>
            <p>See all student records.</p>
            <a href="students.php">Open</a>
        </div>

    </div>

</div>

</body>
</html>
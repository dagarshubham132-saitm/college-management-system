<?php
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h1>Student Records</h1>

<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Roll Number</th>
    <th>Course</th>
    <th>Email</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo htmlspecialchars($row['name']); ?></td>
    <td><?php echo htmlspecialchars($row['roll_no']); ?></td>
    <td><?php echo htmlspecialchars($row['course']); ?></td>
    <td><?php echo htmlspecialchars($row['email']); ?></td>
</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</div>

</body>
</html>
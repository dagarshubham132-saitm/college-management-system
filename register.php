<?php
include 'db.php';

$message = "";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn,
        "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        $message = "Registration successful!";
    } else {
        $message = "Registration failed. Email may already exist.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-box">

<h2>Create Account</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST">

    <input type="text" name="username"
    placeholder="Enter Username" required>

    <input type="email" name="email"
    placeholder="Enter Email" required>

    <input type="password" name="password"
    placeholder="Enter Password" required>

    <button type="submit" name="register">
        Register
    </button>

</form>

<a href="login.php">Already have an account? Login</a>

</div>

</body>
</html>
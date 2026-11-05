<?php
include 'db.php';

$message = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn,
        "SELECT id, username, password FROM users WHERE email = ?");

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            
            header("Location: dashboard.php");
            exit();

        } else {
            $message = "Incorrect password!";
        }

    } else {
        $message = "Account not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-box">

<h2>Login</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="POST">

    <input type="email" name="email"
    placeholder="Enter Email" required>

    <input type="password" name="password"
    placeholder="Enter Password" required>

    <button type="submit" name="login">
        Login
    </button>

</form>

<a href="register.php">Create New Account</a>

</div>

</body>
</html>
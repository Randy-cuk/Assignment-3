<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed);
    if ($stmt->fetch() && password_verify($password, $hashed)) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.html");
    } else {
        echo "Invalid credentials. <a href='index.html'>Try again</a>";
    }
}
?>
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    die("Unauthorized. <a href='index.html'>Login</a>");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = $_POST['data'];

    $stmt = $conn->prepare("INSERT INTO submissions (username, data) VALUES (?, ?)");
    $stmt->bind_param("ss", $_SESSION['user'], $data);

    if ($stmt->execute()) 
    {
        echo "
        <html>
        <head>
            <meta http-equiv='refresh' content='3;url=dashboard.html'>
            <link rel='stylesheet' href='style.css'>
        </head>
        <body>
            <h1>Data submitted successfully!</h1>
            <p>You will be redirected to the dashboard in a moment...</p>
        </body>
        </html>
        ";
    } else 
    {
        echo "Error: " . $stmt->error;
    }
}
?>

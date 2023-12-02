<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        $response['message'] = 'Password and Confirm Password do not match';
        http_response_code(400);
        echo json_encode($response);
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO `users` (username, age, dob, phone_number, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $username, $age, $dob, $phone_number, $hashedPassword);

    if ($stmt->execute()) {
        header("location: login.html");
        exit();
    } else {
        $response['message'] = 'Registration failed';
        http_response_code(500);
        echo json_encode($response);
        // You might want to redirect the user to an error page instead of header("location:script.js");
        // header("location: error.html");
    }

    $stmt->close();
    $mysqli->close();
}
?>

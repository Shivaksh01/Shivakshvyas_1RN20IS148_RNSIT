<?php
session_start();
$msg = false;

if (isset($_POST['username'])) {
    require_once('db.php'); // Make sure to include your database connection file

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use parameterized queries to prevent SQL injection
    $query = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        header('Location: profile.php');
        // echo "<table border='1'>";
        // echo "<tr><th>ID</th><th>Username</th><th>Age</th><th>DOB</th><th>Phone Number</th></tr>";

      
        // while ($row = $result->fetch_assoc()) {
        //     echo "<tr>";
        //     echo "<td>" . $row["id"] . "</td>";
        //     echo "<td>" . $row["username"] . "</td>";
        //     echo "<td>" . $row["age"] . "</td>";
        //     echo "<td>" . $row["dob"] . "</td>";
        //     echo "<td>" . $row["phone_number"] . "</td>";
        //     echo "</tr>";
        // }

        // echo "</table>";
        exit();
    } else {
        $msg = "Incorrect Password";
    }

    $stmt->close();
    $mysqli->close();
}
?>

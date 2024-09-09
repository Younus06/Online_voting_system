<?php
// Connect to MySQL database
$conn = new mysqli('localhost', 'root', '', 'voting_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected candidate from the form
    $candidate = $_POST['candidate'];

    // Insert vote into the database
    $sql = "INSERT INTO votes (candidate) VALUES ('$candidate')";

    if ($conn->query($sql) === TRUE) {
        echo "Vote submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

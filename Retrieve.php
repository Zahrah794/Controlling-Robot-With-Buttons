<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robotctrl";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the last entered movement from the database
$sql = "SELECT Direction FROM btns ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Process and display the last entered movement
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $movement = $row['Direction'];
    echo "<p>Last Entered Movement: " . $movement . "</p>";
} else {
    echo "No movements found.";
}

$conn->close();
?>


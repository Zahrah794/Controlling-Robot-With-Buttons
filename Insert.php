<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robotctrl";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
$butn = $_POST['Direction'];

$stmt = $conn->prepare("INSERT INTO btns (Direction) VALUES (?)");
$stmt->bind_param("s", $butn);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
}
header("Location:ctrlbtn.html");

$conn->close();
?>

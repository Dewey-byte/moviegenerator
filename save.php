<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "movies_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape and insert data
$title = $conn->real_escape_string($_POST['title']);
$poster = $conn->real_escape_string($_POST['poster']);
$overview = $conn->real_escape_string($_POST['overview']);

$sql = "INSERT INTO saved_movies (title, poster, overview) VALUES ('$title', '$poster', '$overview')";
$conn->query($sql);

$conn->close();
header("Location: saved.php");

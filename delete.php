<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "movies_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
  $id = intval($_POST['id']);
  $sql = "DELETE FROM saved_movies WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    header("Location: saved.php");
    exit();
  } else {
    echo "Error deleting movie: " . $conn->error;
  }
}

$conn->close();
?>

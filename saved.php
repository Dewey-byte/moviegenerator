<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "movies_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM saved_movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Saved Movies</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">

  <!-- Navigation Bar -->
  <nav class="bg-gray-800 p-4">
    <div class="max-w-5xl mx-auto flex justify-between items-center">
      <a href="index.html" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">← Back to Home</a>
      <a href="about.html" class="text-white hover:underline">ℹ️ About</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="p-6 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">📽️ Saved Movies</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php while($row = $result->fetch_assoc()): ?>
        <div class="bg-gray-800 p-4 rounded shadow">
          <h2 class="text-xl font-semibold mb-2"><?php echo $row['title']; ?></h2>
          <img src="<?php echo $row['poster']; ?>" class="mb-2 rounded w-full h-64 object-cover" />
          <p class="text-gray-300 text-sm mb-2"><?php echo $row['overview']; ?></p>
          <form method="POST" action="delete.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            <button type="submit" class="bg-red-600 px-3 py-1 rounded hover:bg-red-700 w-full">Delete</button>
          </form>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</body>
</html>

<?php
$conn->close();
?>
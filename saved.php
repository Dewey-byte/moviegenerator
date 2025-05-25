<?php
$conn = new mysqli("localhost", "root", "", "movies_db");
$result = $conn->query("SELECT * FROM saved_movies");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Saved Movies</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white p-6">
  <h1 class="text-3xl font-bold mb-4">🎥 Saved Movies</h1>
  <div class="grid grid-cols-2 gap-4">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="bg-gray-800 p-4 rounded">
        <h2 class="text-xl font-semibold"><?= $row['title'] ?></h2>
        <img src="<?= $row['poster'] ?>" class="my-2 rounded" />
        <p class="text-sm text-gray-300"><?= $row['overview'] ?></p>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>

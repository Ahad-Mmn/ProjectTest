<?php
include("db.php");
$results = mysqli_query($mysqli, "SELECT * FROM videogames ORDER BY released_date");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Game Collection</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main class="wrap">
  <h1>My game collection</h1>

  <form class="search" action="search-games.php" method="post">
    <input type="text" name="keywords" placeholder="Search games" aria-label="Search games">
    <input type="submit" value="Search">
  </form>

  <ul class="game-list">
  <?php while ($a_row = mysqli_fetch_assoc($results)): ?>
    <li>
      <a class="game" href="game-details.php?id=<?= (int)$a_row['game_id'] ?>">
        <span><?= htmlspecialchars($a_row['game_name']) ?></span>
        <span class="rating"><?= htmlspecialchars($a_row['rating']) ?></span>
      </a>
    </li>
  <?php endwhile; ?>
  </ul>
</main>
</body>
</html>

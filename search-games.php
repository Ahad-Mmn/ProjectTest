<?php
include("db.php");
$keywords = $_POST['keywords'] ?? '';
$like = "%" . $keywords . "%";
$stmt = $mysqli->prepare("SELECT * FROM videogames WHERE game_name LIKE ? ORDER BY released_date");
$stmt->bind_param("s", $like);
$stmt->execute();
$results = $stmt->get_result();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Search results</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main class="wrap">
  <a class="back" href="list-games.php">&laquo; Back to list</a>
  <h1>Search results</h1>

  <form class="search" action="search-games.php" method="post">
    <input type="text" name="keywords" value="<?= htmlspecialchars($keywords) ?>" placeholder="Search games" aria-label="Search games">
    <input type="submit" value="Search">
  </form>

  <?php if ($results->num_rows === 0): ?>
    <p class="empty">No games match “<?= htmlspecialchars($keywords) ?>”. Try a different word.</p>
  <?php else: ?>
  <ul class="game-list">
  <?php while ($a_row = $results->fetch_assoc()): ?>
    <li>
      <a class="game" href="game-details.php?id=<?= (int)$a_row['game_id'] ?>">
        <span><?= htmlspecialchars($a_row['game_name']) ?></span>
        <span class="rating"><?= htmlspecialchars($a_row['rating']) ?></span>
      </a>
    </li>
  <?php endwhile; ?>
  </ul>
  <?php endif; ?>
</main>
</body>
</html>

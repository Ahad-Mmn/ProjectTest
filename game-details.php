<?php
include("db.php");
$id = (int)($_GET['id'] ?? 0);
$stmt = $mysqli->prepare("SELECT * FROM videogames WHERE game_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$a_row = $stmt->get_result()->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $a_row ? htmlspecialchars($a_row['game_name']) : 'Game not found' ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main class="wrap">
  <a class="back" href="list-games.php">&laquo; Back to list</a>
  <?php if ($a_row): ?>
  <article class="detail">
    <h1><?= htmlspecialchars($a_row['game_name']) ?></h1>
    <span class="rating"><?= htmlspecialchars($a_row['rating']) ?></span>
    <p><?= nl2br(htmlspecialchars($a_row['game_description'])) ?></p>
  </article>
  <?php else: ?>
  <p class="empty">That game isn't in your collection.</p>
  <?php endif; ?>
</main>
</body>
</html>

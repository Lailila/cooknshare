<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$title = 'Cook & Share';
require_once "../DB/DBconnect.php";
include "../includes/header.php";
$category = $_GET['category'] ?? null;
$search = $_GET['search'] ?? null;
$sql = (
  "SELECT r.id, r.title, r.user_id, r.image_path, r.ingredients, r.category, u.username 
  FROM recipes r 
  JOIN users u ON r.user_id = u.id");
$params = [];
$conditions = [];
if (!empty($category)) {
  $conditions[] .= "r.category = ?"; //Platzhalter für category
  $params[] = $category; //Parameter 1
}
if (!empty($search)) {
  $conditions[] = "r.title LIKE ?"; //Plathalter für Suchbegriff
  $params[] = "%" . $search . "%"; //Parameter 2
}
if (!empty($conditions)) {
  $sql .= " WHERE " . implode(" AND ", $conditions); //macht conditions array zu string
}
$sql .= " ORDER BY r.created_at DESC";
$stmt = connect()->prepare($sql);
$stmt->execute($params);
$recipes = $stmt->fetchAll();
?>
<div class="container main-wrap">
    <h2 class="page-title mb-5 text-center">Willkommen auf <span></span><em><strong>Cook & Share</strong></em>!</h2>

  <div class="container mb-3">
    <div class="dropdown col">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Kategorie
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="mainpage.php">Alle</a></li>
        <li><a class="dropdown-item" href="mainpage.php?category=appetizer">Vorspeise</a></li>
        <li><a class="dropdown-item" href="mainpage.php?category=maindish">Hauptspeise</a></li>
        <li><a class="dropdown-item" href="mainpage.php?category=dessert">Nachspeise</a></li>
      </ul>
    </div>
    <form class="d-flex me-3" method="GET" action="mainpage.php" role="search">
      <!-- Wenn Kategorie schon gesetzt ist, soll sie auch beim Suchen beibehalten werden, wird mitgeschickt -->
      <?php if (!empty($category)): ?>
        <input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">
      <?php endif; ?>
      <input class="form-control me-2" type="search" name="search" placeholder="Pizza..." aria-label="Search">
      <button class="btn btn-secondary" type="submit">Search</button>
    </form>
  </div>
  <?php include "../includes/recipe-card.php" ?>
  <?php include "../includes/footer.php" ?>
</div>
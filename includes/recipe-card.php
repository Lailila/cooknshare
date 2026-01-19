<!-- Diese Datei enthält die Recipe-Card, die auf mehreren Seiten in einer foreach Schleife dargestellt wird (mainpage, favorites, meine Rezepte) und wird daher immer eingebunden mit angepasster DB Abfrage -->
<div class="container text-center contents">
  <?php if (isset($displayUsername)) : ?>
    <h2 class="page-title mb-5"><?= htmlspecialchars($title) ?></h2>
  <?php endif; ?>

  <div class="row mb-5">
    <?php if (empty($recipes)) : ?>
      <p class="text-muted">Keine Rezepte gefunden.</p>
    <?php endif; ?>

    <?php foreach ($recipes as $recipe): ?>
      <div class="col-12 col-lg-4 mb-4">
        <div class="card h-100 recipe-card">
<!-- Rezept-Id wird in URL mitgegeben, um das richtige Rezept bei recipe.php darzustellen-->
          <a href="../pages/recipe.php?id=<?= (int)$recipe['id'] ?>"
            class="text-decoration-none text-dark d-block h-100">

            <img src="<?= htmlspecialchars($recipe['image_path']) ?>"
              class="card-img-top"
              alt="<?= htmlspecialchars($recipe['title']) ?>">

            <div class="card-body text-start">
              <h5 class="card-title"><?= htmlspecialchars($recipe['title']) ?></h5>

              <p class="card-text text-muted small">
                <?= htmlspecialchars(mb_strimwidth($recipe['ingredients'], 0, 80, '...')) ?>
              </p>
            </div>
          </a>


          <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
            <!-- den Benutzernamen des aktuellen angemeldeten Benutzer auf favorite.php und MyRecipe.php anzeigen -->
            <?php if ($title === 'Meine Favoriten' || $title === 'Meine Rezepte') : ?>
              <small class="text-secondary">
                von <?= htmlspecialchars($displayUsername) ?>
              </small>
              <!-- den Benutzernamen der Rezepte auf mainpage.php anzeigen -->
            <?php elseif ($title === 'Cook & Share') : ?>
              <small class="text-secondary">
                von <?= htmlspecialchars($recipe['username']) ?>
              </small>
            <?php endif; ?>

            <!-- zwei Buttons zum löschen und zum bearbeiten auf MyRecipe.php  -->
            <?php if ($title === 'Meine Rezepte') : ?>
              <div class="d-flex">
                <form class="edit-button" action="./edit_recipe_form.php" method="GET">
                  <input type="hidden" name="id" value="<?= (int)$recipe['id'] ?>">
                  <input class="btn btn-secondary btn-sm" type="submit" value="bearbeiten">
                </form>
                <form action="delete_recipeUser.php"
                  method="POST"
                  onsubmit="return confirm('Rezept wirklich löschen?');">
                  <input type="hidden" name="recipe_id" value="<?= (int)$recipe['id'] ?>">
                  <input class="btn btn-secondary btn-sm" type="submit" value="löschen">
                </form>
              </div>
            <?php endif; ?>
          </div>


        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
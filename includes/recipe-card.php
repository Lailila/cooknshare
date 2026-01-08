<!-- Das könnten wir auf jeder Seite einbinden, die die Rezepte enthält, also mainpage, Favoriten und Meine Rezepte und je nachdem ein anderes statement schreiben und entweder alle Rezepte aus der DB holen (mainpage), nur die eigenen mit userId (meine Rezepte) oder auch mit userId (Favoriten) 
Dann noch mit deinem css stylen, dann ist es überall gleich -->
<div class="container text-center contents">
    <div class="row mb-5">
      <?php if(empty($recipes)) : ?>
        <p class="text-muted">Keine Rezepte gefunden.</p>
      <?php endif; ?>
      <?php foreach($recipes as $recipe): ?>
        <div class="col-12 col-lg-4 mb-4">
          <div class="card h-100 recipe-card">
            <a href="../pages/recipe.php?id=<?= (int)$recipe['id'] ?>" class="text-decoration-none text-dark d-block h-100">
              <img src="<?= htmlspecialchars($recipe['image_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($recipe['title']) ?>">
              <div class="card-body text-start">
                <h5 class="card-title">
                  <?= htmlspecialchars($recipe['title']) ?>
                </h5>
                <p class="card-text text-muted small">
                  <?= htmlspecialchars(mb_strimwidth($recipe['ingredients'], 0, 80, '...')) ?>
                </p>
                <p class="card-text">
                  <small class="text-secondary">von <?= htmlspecialchars($recipe['username']) ?></small>
                </p>
              </div>
            </a>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
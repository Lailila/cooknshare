<?php
require __DIR__ . "/../includes/secure.php"; 
$currentPage = 'dashboard';
require __DIR__ . "/../includes/header.php"; ?>

<div class="container mt-4">
    <h2 class="mb-4">Willkommen,[username] <?php echo htmlspecialchars($user["username"]); ?> !</h2>

    
        <div class="profil mb-5">
            <div class="card shadow-sm">
              <img src="../img/profile.jpg">
                <!-- <img src="<?php echo $user["profile_image"]; ?>" class="card-img-top" alt="Profilbild"> -->
                <div class="card-body">
                    <h5 class="card-title">
                      Mein Profil
                      <!-- <?php echo htmlspecialchars($user["username"]); ?> -->
                    </h5>
                    <p class="card-text text-muted"><?php echo htmlspecialchars($user["email"]); ?></p>
                    <a href="profil.php" class="btn btn-outline-success w-100">Profil bearbeiten</a>
                </div>
            </div>
        </div>


        <div class="my-recipes">
            <h4>Meine Favoriten</h4>
            <div class="content">
                <!-- <?php foreach ($recipes as $recipe): ?> -->
                    <div class=" mb-3">
                        <div class="card h-100 shadow-sm">
                          <img src="../img/pizza.jpg">
                             <!-- <img src="<?php echo $recipe["image"]; ?>" class="card-img-top" alt="Rezeptbild"> -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($recipe["title"]); ?></h5>
                                <p class="card-text"><span class="text-danger">❤️ <?php echo $recipe["likes"]; ?> Likes</span></p>
                                <a href="favorite.php" class="btn btn-success w-100">Ansehen</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="upload.php" class="btn btn-outline-success mt-3 mb-5">➕ Neues Rezept hochladen</a>
        </div>
        <div class="my-recipes">
            <h4>Meine Rezepte</h4>
            <div class="content">
                <!-- <?php foreach ($recipes as $recipe): ?> -->
                    <div class=" mb-3">
                        <div class="card h-100 shadow-sm">
                          <img src="../img/pizza.jpg">
                             <!-- <img src="<?php echo $recipe["image"]; ?>" class="card-img-top" alt="Rezeptbild"> -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($recipe["title"]); ?></h5>
                                
                                <a href="MRezepte.php" class="btn btn-success w-100">Ansehen</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</div>

<?php require __DIR__ . "/../includes/footer.php"; ?>

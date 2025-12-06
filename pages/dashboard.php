<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/index.css">
</head>

<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-5">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img src="../img/frying-pan_10647075.png"
            class="d-inline-block align-text-top me-2 index-logo" alt="Cook & Share Logo"></a>
        <div class="navbar-collapse d-flex">
          <!-- Linke Navigationsleiste -->
          <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
              <a class="nav-link active" href="./dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./favorite.php">Favoriten</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./upload.php">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./MRezepte.php">Meine Rezepte</a>
            </li>
          </ul>

          <!-- Rechte Seite -->
          <!--<form class="d-flex me-3" role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>-->
          <a class="nav-link" href="../pages/login.php">
            <button class="btn btn-secondary">Login/Registrieren</button>
          </a>
        </div>
    </nav>
  </header>

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

<footer class="site-footer">
    <div class="container">
      <p>© Cook &amp; Share — Team Rath &amp; Wollinger</p>
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

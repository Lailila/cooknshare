<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/index.css">
</head>
<body>
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
          <a class="nav-link" href="./index.php">
            <button class="btn btn-secondary">Abmelden</button>
          </a>
        </div>
    </nav>
  </header>
  <main class="align-items-center p-5">
    <h2 class="text-center p-5"><em>Erstelle ein neues Rezept für die Community</em></h2>
    <div class="container-fluid">
      <form action="/upload" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="fs-4 mb-2" for="rezept-title">Titel:</label>
          <input class="form-control" type="text" required id="rezept-title">
        </div>
        <div class="mb-3">
          <label for="rezept-zutaten" class="fs-4 mb-2">Zutaten:</label>
          <input type="text" class="form-control" id="rezept-zutaten" placeholder="Mehl, Eier, Zucker, ...">
        </div>
        <div class="mb-3">
          <label for="zubereitung" class="fs-4 mb-2">Zubereitung:</label>
          <textarea class="form-control" name="zubereitung" id="zubereitung"></textarea>
        </div>
        <div class="mb-5">
          <label for="formFile" class="form-label fs-4 mb-2">Bild hochladen</label>
          <input class="form-control" type="file" id="formFile" accept="image/*">
        </div>
        <button class="btn btn-primary">Rezept hochladen</button>
      </form>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© Cook &amp; Share — Team Rath &amp; Wollinger</p>
    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
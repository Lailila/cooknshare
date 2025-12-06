<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dein Profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/index.css">
</head>
<body class="vh-100">
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
  <main class="align-items-center vh-100 justify-content-between d-flex">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-4 col-12 text-center">
      <img src="../img/profile.jpg" alt="" class="img-fluid rounded-5 mb-5">
      <button class="btn btn-primary fs-4">neues Profilbild hochladen</button>
    </div>
    <div class="col-lg-8 col-12">
      <table class="table table-hover fs-4">
        <tr>
          <td class="fw-bold">Username:</td>
          <td>Lisa</td>
        </tr>
        <tr>
          <td class="fw-bold">E-Mail:</td>
          <td>lisa123@gmail.com</td>
        </tr>
        <tr>
          <td class="fw-bold">Hochgeladene Rezepte:</td>
          <td>63</td>
        </tr>
        <tr>
          <td class="fw-bold">beigetreten am:</td>
          <td>05.09.2012</td>
        </tr>
      </table>
    </div>
  </div>
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
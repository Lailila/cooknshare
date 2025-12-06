<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
              <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Favoriten</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./upload.php">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profil.php">Profil</a>
            </li>
          </ul>

          <!-- Rechte Seite -->
          <a class="nav-link" href="./index.php">
            <button class="btn btn-secondary">Abmelden</button>
          </a>
        </div>
    </nav>
  </header>
  <main>
  <div class="container-fluid p-5">
    <h3 class="text-center mb-3">User</h3>
    <table class="table table-hover mb-5">
      <tr>
        <th scope="col">#</th>
        <th scope="col">User</th>
        <th scope="col">beigetreten am</th>
        <th scope="col">deaktivieren</th>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Lisa</td>
        <td>05.09.2012</td>
        <td><button class="btn btn-primary">✓</button></td>
        
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Andrea</td>
        <td>12.11.2025</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Tom</td>
        <td>10.08.2020</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Alina</td>
        <td>30.04.2016</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Vincent</td>
        <td>05.10.2022</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Lara</td>
        <td>21.03.2013</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">7</th>
        <td>Max</td>
        <td>10.12.2014</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
    </table>
    <h3 class="text-center mb-3">Rezepte</h3>
    <table class="table table-hover mb-5">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titel</th>
        <th scope="col">User</th>
        <th scope="col">erstellt am</th>
        <th scope="col">löschen</th>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>Lahmacun</td>
        <td>Max</td>
        <td>03.02.2024</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Pizza Margherita</td>
        <td>Lisa</td>
        <td>12.10.2025</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Ramen</td>
        <td>Andrea</td>
        <td>24.08.2025</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
    </table>
    <h3 class="text-center mb-3">Kommentare</h3>
    <table class="table table-hover">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Kommentar</th>
        <th scope="col">User</th>
        <th scope="col">erstellt am</th>
        <th scope="col">löschen</th>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>"Super lecker! Werde ich auf jeden Fall wieder machen."</td>
        <td>Max</td>
        <td>03.02.2024</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>"Leider etwas trocken. Ich würde lieber noch etwas Milch hinzugeben."</td>
        <td>Lisa</td>
        <td>12.10.2025</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>"Hat der ganzen Familie geschmeckt, vielen Dank!"</td>
        <td>Andrea</td>
        <td>24.08.2025</td>
        <td><button class="btn btn-primary">✓</button></td>
      </tr>
    </table>
  </div>
  </main>
  <footer class="site-footer">
      <div class="container">
        <p>© Cook &amp; Share</p>
      </div>
  </footer>
</body>
</html>
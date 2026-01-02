<?php 
$requiredRole = "admin";
require __DIR__ . "/../../includes/secure.php";
$currentPage = 'admin';
require __DIR__ . "/../../includes/header.php"; ?>
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
<?php require __DIR__ . "/../../includes/footer.php"; ?>
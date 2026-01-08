<?php 
  $title = 'Pizza Margherita';
  include "../includes/header.php";
?>

    <div class="container contents">
        <div class="recipe-main">
          <img class="card-img-top mb-5"
            src="../img/pizza.jpg"
            alt="Pizza Margherita"
          />
          <div class="recipe-meta shadow p-3 mb-5  bg-body rounded">
            <h1 class="mb-3">Pizza Margherita</h1>
            <p>von Anna • 4 Zutaten • 20 min</p>
            <div class="actions">
              <button class="favorit">☆ Favorit</button>
            </div>
          </div>
        </div>

        <section class="row">
          <div class="zutaten col mb-5 shadow p-3 me-5 bg-body rounded">
            <h2>Zutaten</h2>
            <ul>
              <li>400 g Spaghetti</li>
              <li>400 g Tomaten</li>
              <li>1 Bund Basilikum</li>
              <li>Olivenöl, Salz, Pfeffer</li>
            </ul>
          </div>

          <div class="anleitung col mb-5 shadow p-3 bg-body rounded">
            <h2>Anleitung</h2>
            <ol>
              <li>Spaghetti al dente kochen.</li>
              <li>Tomaten würfeln, mit Olivenöl anbraten.</li>
              <li>Basilikum untermischen, abschmecken und servieren.</li>
            </ol>
          </div>
        </section>

        <section class="comment shadow p-3 bg-body rounded">
          <h2>Kommentare</h2>
          <div class="comment">
            <p class="comment-meta"><strong>Lisa</strong> • 2 Tage</p>
            <p>Sehr lecker! Habe noch Oliven hinzugefügt.</p>
          </div>


    <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Deine Kommentare</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<input class="btn btn-primary" type="submit" value="Submit">


          <!-- <form class="comment-form" aria-label="Kommentar hinzufügen">
            <textarea
              placeholder="Deinen Kommentar schreiben..."
              rows="3"
            ></textarea>
            <button>Kommentieren</button>
          </form> -->
        </section>
    </div>

<?php include "../includes/footer.php"; ?>


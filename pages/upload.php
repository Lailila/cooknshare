<?php 
$currentPage = 'upload';
require __DIR__ . "/../includes/header.php"; ?>
  <div class="align-items-center p-5">
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
</div>
<?php require __DIR__ . "/../includes/footer.php"; ?>
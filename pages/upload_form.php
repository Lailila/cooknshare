<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../classes/db_access.php';
require_once '../security.php';

//prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if (!$result) {
  header('Location: ../signup_in/login_form.php');
  return;
}

$err_msgs = $_SESSION['err_msgs'] ?? [];
unset($_SESSION['err_msgs']);

$old = $_SESSION['old'] ?? [];
unset($_SESSION['old']);

// require_once '../DB/DBconnect.php';
// $files = db_access::getAllFile();


$title = 'Upload';
include "../includes/header.php";

?>

<div class="upload container main-wrap">
  <h2 class="page-title mb-5 text-center">Erstelle ein neues Rezept für die Community</h2>
  <div class="container-fluid">
    <form action="./upload.php" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label class="fs-4 mb-2" for="rezept-title">Titel:</label>
        <input class="form-control" type="text" id="rezept-title" name="title" value="<?php echo htmlspecialchars($old['title'] ?? '', ENT_QUOTES); ?>">

        <?php if (isset($err_msgs['title'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['title']; ?></p>
        <?php endif; ?>
        <?php if (isset($err_msgs['title_size'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['title_size']; ?></p>
        <?php endif; ?>
      </div>


      <div class="mb-3">
        <p class="fs-4 mb-2">Kategorie</p>
        <div>
          <input type="radio" id="category1" name="category" value="appetizer" <?php if (($old['category'] ?? '') === 'appetizer') echo 'checked'; ?>>
          <label for="category1">Vorspeise</label>

          <input type="radio" id="category2" name="category" value="maindish" <?php if (($old['category'] ?? '') === 'maindish') echo 'checked'; ?>>
          <label for="category2">Hauptspeise</label>

          <input type="radio" id="category3" name="category" value="dessert" <?php if (($old['category'] ?? '') === 'dessert') echo 'checked'; ?>>
          <label for="category3">Nachspeise</label>
        </div>
        <?php if (isset($err_msgs['category'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['category']; ?></p>
        <?php endif; ?>
      </div>


      <div class="mb-3">
        <label for="rezept-zutaten" class="fs-4 mb-2">Zutaten:</label>
        <textarea class="form-control" id="rezept-zutaten" placeholder="100g Mehl, 1 Ei, 30g Zucker, ..." name="ingredients" value="<?php echo htmlspecialchars($old['ingredients'] ?? '', ENT_QUOTES); ?>"></textarea>
        <?php if (isset($err_msgs['ingredients'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['ingredients']; ?></p>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="Anleitung" class="fs-4 mb-2">Anleitung:</label>
        <textarea class="form-control" name="description" id="Anleitung" placeholder="Die Zwiebel und den Knoblauch abziehen und sehr fein schneiden.
Die Chilischote entkernen und ebenso fein hacken.
Die Kirschtomaten waschen und halbieren...
"><?php echo htmlspecialchars($old['description'] ?? '', ENT_QUOTES); ?></textarea>

        <?php if (isset($err_msgs['description'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['description']; ?></p>
        <?php endif; ?>
      </div>
      <div class="mb-5">
        <label for="formFile" class="form-label fs-4 mb-2">Bild hochladen</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input class="form-control" type="file" id="formFile" accept="image/*" name="img">
        <?php if (isset($err_msgs['filesize'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['filesize']; ?></p>
        <?php endif; ?>
        <?php if (isset($err_msgs['file_type'])) : ?>
          <p class="text-danger"><?php echo $err_msgs['file_type']; ?></p>
        <?php endif; ?>

      </div>

      <div class="d-grid gap-2">
        <input type="submit" value="Rezept hochladen">
      </div>

    </form>

  </div>
</div>
<?php require __DIR__ . "/../includes/footer.php"; ?>
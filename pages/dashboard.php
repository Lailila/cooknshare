<?php
//Diese Datei enthält die Dashboardseite. Users können auf ihre Profil, hochgeladene Rezepte und Favoriten zugreifen.
//Nach dem Einloggen öffnet sich diese Seite automatisch.
session_start();
require_once '../classes/UserLogic.php';
require_once '../security.php';
require_once '../classes/db_access.php';

//wenn man nicht eingeloggt ist, wird signup-form weitergeleitet.
$result = UserLogic::checkLogin();
if (!$result) {
    header('Location: ../signup_in/login_form.php');
    return;
}

$login_user = $_SESSION['login_user'];
$user_id = $_SESSION['login_user']['id'];
//das Bild(Pfad) der neuesten Rezept holen
$RecipeImagePath = db_access::getLatestRecipeImagePathByUserId($user_id);
//das Bild(Pfad) der neuesten Favoritenrezept holen
$FavImagePath = db_access::getLatestFavImagePathByUserId($user_id);

$title = 'Dashboard';
include "../includes/header.php";
?>


<div class="dashboard container text-center contents">
    <h2 class="page-title mb-5">Willkommen, <i><?php echo h($login_user['username']) ?></i> !</h2>

    <div class="flex mb-5">
        <div class="left">
            <div class="profile">
                <h4 class="content-title">Mein Profil</h4>
                <div class="card shadow-sm">
                    <!-- Profil-Foto anzeigen -->
                    <img src="<?= $login_user['image_path'] ? htmlspecialchars($login_user['image_path']) : '../img/profile-default.svg' ?>" alt="" class="profi-img img-fluid">
                    <div class="button">
                        <a href="profil.php" class="btn w-100">Ansehen</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="right">
            <div class="my-recipes">
                <h4 class="content-title">Meine Rezepte</h4>
                <div class="content">
                    <div class="mb-3">
                        <div class="card shadow-sm">
                            <!-- das Bild der neuesten Favoritenrezept anzeien -->
                            <img src="<?php echo $RecipeImagePath ?>">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="button">
                                    <a href="MyRecipe.php" class="btn">Ansehen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="favorites">
                <h4 class="content-title">Meine Favoriten</h4>
                <div class="content">
                    <div class=" mb-3">
                        <div class="card shadow-sm">
                            <!-- das Bild der neuesten Rezept anzeien -->
                            <img src="<?php echo $FavImagePath ?>">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="button">
                                    <a href="favorite.php" class="btn">Ansehen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../includes/footer.php" ?>
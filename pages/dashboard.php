<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../security.php';
require_once '../classes/db_access.php';

//prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();
if (!$result) {
    header('Location: ../signup_in/login_form.php');
    return;
}

$login_user = $_SESSION['login_user'];
$user_id = $_SESSION['login_user']['id'];
$RecipeImagePath = db_access::getLatestRecipeImagePathByUserId($user_id);
$FavImagePath = db_access::getLatestFavImagePathByUserId($user_id);

$title = 'Dashboard';
include "../includes/header.php";
?>


<div class="dashboard container text-center contents">
    <h2 class="page-title mb-5">Willkommen, <i><?php echo h($login_user['username']) ?></i> !</h2>

    <div class="flex mb-5">
        <div class="left">
            <div class="profile">
                <h4>Mein Profil</h4>
                <div class="card shadow-sm">
                    <img src="<?= $login_user['image_path'] ? '../uploads/profile/' . htmlspecialchars($login_user['image_path']) : '../img/profile-default.svg' ?>" alt="" class="profi-img img-fluid rounded-5">
                    <div class="button">
                        <a href="profil.php" class="btn w-100">Ansehen</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="right">
            <div class="my-recipes">
                <h4>Meine Rezepte</h4>
                <div class="content">
                    <div class="mb-3">
                        <div class="card shadow-sm">
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
                <h4>Meine Favoriten</h4>
                <div class="content">
                    <div class=" mb-3">
                        <div class="card shadow-sm">
                            <?php var_dump($FavImagePath); ?>
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
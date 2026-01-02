<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../security.php';


//prüft, ob man eingeloggt ist. Wenn ja, gibt sie true zurück. Sonst falsch.
$result = UserLogic::checkLogin();

if (!$result) {
  header('Location: ../signup_in/login_form.php');
  return;
}

$login_user = $_SESSION['login_user'];



?>

<?php 
    $title = 'Dashboard';
    include "../includes/header.php" 
?>
<main>
<div class="container mt-4">
    <h2 class="mb-4">Willkommen, <i><?php echo h($login_user['username']) ?></i> !</h2>

    
        <div class="profil mb-5">
            <div class="card shadow-sm">
              <img src="../img/profile.jpg">
                
                <div class="card-body">
                    <h5 class="card-title">
                      Mein Profil
                      
                    </h5>
                    <p class="card-text text-muted"></p>
                    <a href="profil.php" class="btn btn-outline-success w-100">Profil bearbeiten</a>
                </div>
            </div>
        </div>


        <div class="my-recipes">
            <h4>Meine Favoriten</h4>
            <div class="content">
                    <div class=" mb-3">
                        <div class="card h-100 shadow-sm">
                          <img src="../img/pizza.jpg">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"><span class="text-danger">❤️ Likes</span></p>
                                <a href="favorite.php" class="btn btn-success w-100">Ansehen</a>
                            </div>
                        </div>
                    </div>
            </div>
            <a href="upload.php" class="btn btn-outline-success mt-3 mb-5">➕ Neues Rezept hochladen</a>
        </div>
        <div class="my-recipes">
            <h4>Meine Rezepte</h4>
            <div class="content">
                    <div class=" mb-3">
                        <div class="card h-100 shadow-sm">
                          <img src="../img/pizza.jpg">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <a href="MRezepte.php" class="btn btn-success w-100">Ansehen</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
</div>

</main>

<?php include "../includes/footer.php" ?>
</body>
</html>

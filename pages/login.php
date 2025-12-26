<?php 
session_start();
require __DIR__ . "/../includes/header.php"; ?>
<div class="container py-5">
<!--Login-Bereich-->
      <h3 class="h3 text-center mb-3">Login</h3>
          <form method="POST" class="mx-auto login-card">
          <div class="card shadow rounded-4 p-4 mb-4 card-accent">
            <div class="mb-3"><label for="username-login" class="form-label"></label>
              <input type="text" placeholder="Username" class="form-control" id="username-login" name="username-login" required></div>
            <div class="mb-3">
              <label for="password-login" class="form-label"></label>
            <input type="password" id="password-login" placeholder="Passwort" class="form-control" required>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input type="checkbox" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Anmeldedaten merken</label>
              </div>
              <a class="link-primary link-offset-2" href="#">Passwort zurücksetzen</a>
            </div>
            
            
            <button class="btn btn-primary w-100" id="submit-login">Einloggen</button>
          </div>
          </form>
          <!--Registrier-Bereich-->
          <h3 class="mb-3 text-center">Registrieren</h3>
          <form method="POST" action="registration.php" class="login-card mx-auto">
          <div class="card card-accent shadow rounded-4 p-4 mb-4">
            <div class="mb-3">
              <label for="email" class="form-label"></label>
            <input class="form-control" type="email" name="email" placeholder="E-Mail" id="email" value="<?php echo htmlspecialchars($email);?>" required>
            </div>
            
            <div class="mb-3">
              <label for="username-register"></label class="form-label">
            <input class="form-control" type="text" name="username-register" placeholder="Username" id="username-register" value= "<?php echo htmlspecialchars($username);?>" required>
            </div>
            
            <div class="mb-4">
              <label for="password-register" class="form-label"></label>
            <input class="form-control" type="password" name="password-register" placeholder="Passwort" id="password-register" value= "<?php echo htmlspecialchars($password);?>"  required>
            </div>
            
            <div class="d-grid gap-2">
              <button class="btn btn-primary">Registrieren</button>
            </div>
          </div>
        </form>
      </div>      

<?php require __DIR__ . "/../includes/footer.php"; ?>

<?php
  session_start();
  $error = "";
  $adminUser = "admin";
  $adminPass = "admin123";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $LogUsername = trim($_POST['username-login'] ?? '');
    $LogPassword = trim($_POST['password-login'] ?? '');

    if ($LogUsername === $adminUser && $password === $adminPass) {
      $_SESSION["admin_logged_in"] = true; // Set new session variable
      header("Location: admin.php");
      exit(); // Terminates the script
      } else {
        $error = "Invalid login!";
      }

  }

?>
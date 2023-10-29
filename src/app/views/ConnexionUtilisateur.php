<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../controllers/UtilisateurController.php';
$utilisateurController = new UtilisateurController($mysqli);
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $utilisateurs = $utilisateurController->connexionUtilisateur($email, $password);
    if ($utilisateurs !== false) {
        foreach ($utilisateurs as $utilisateur) {
            //var_dump($utilisateur);
        }
        $_SESSION['utilisateur'] = $utilisateurs;
        echo 'Vous êtes connecté';
        echo 'test';
        var_dump($_SESSION['utilisateur']);
        if(isset($_SESSION['utilisateur'])){
            header('Location: ../public/index.php');
        }

       // header('Location: ../public/index.php');
    } else {
        $error = 'identifiants incorrecte';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if (isset($error)): ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>

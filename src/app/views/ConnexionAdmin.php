<?php 
if (isset($_POST['email']) && isset($_POST['password'])) {
   if ($_POST['email'] === 'root' && $_POST['password'] === '63WSLXppc65y4i') {
        session_start();
       $_SESSION['email'] = $_POST['email'];
       header('Location: pageAdmin.php');
   } else {
       echo 'Mauvais identifiants';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ConnexionAdmin.php" method="post">
        <label for="email">Utilisateur</label>
        <input name="email" id="email" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>

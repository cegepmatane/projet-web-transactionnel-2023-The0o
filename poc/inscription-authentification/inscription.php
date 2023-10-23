<?php
$motDePasseClair = "motDePasse";
//on recupere le mot de passe que le client indique lors de la création de son compte
echo "Mot de passe en clair -> ".$motDePasseClair."\n";

$motDePasseChiffre = password_hash($motDePasseClair, PASSWORD_DEFAULT);
//on le crypte et on met cette valeur dans la base de données
echo "Mot de passe crypté -> ".$motDePasseChiffre."\n";

$verificationMotDePasse1 = password_verify("password", $motDePasseChiffre);
$verificationMotDePasse2 = password_verify("motdepasse", $motDePasseChiffre);
$verificationMotDePasse3 = password_verify("motDePasse", $motDePasseChiffre);
//A chaque tentative de connection de l'utilisateur, on verifie le mot de passe qu'il vient de taper avec le mot de passe cfypté dans la base de données
echo $verificationMotDePasse1;

echo "Vérification du mot de passe 'password' -> ".$verificationMotDePasse1."\n";
echo "Vérification du mot de passe 'motdepasse' -> ".$verificationMotDePasse2."\n";
echo "Vérification du mot de passe 'motDePasse' -> ".$verificationMotDePasse3."\n";
?> 

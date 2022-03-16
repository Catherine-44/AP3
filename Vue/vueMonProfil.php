<html>
<meta charset="UTF-8">
<br>
<title> Mon profil </title>
<h1>Mon profil</h1>
<br>
Mon nom : <?= daoauthentification::getnomLoggedOn() ?> <br /> 
<br>
Mon prenom : <?= daoauthentification::getprenomLoggedOn() ?> <br />
<br>
Mon adresse : <?= daoauthentification::getadresseLoggedOn() ?> <br />

</html>
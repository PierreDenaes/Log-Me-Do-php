<?php
session_start();
include 'includes/identifiants.php';
if (isset($_POST['signIn'])) {
	$pseudo = stripslashes(htmlentities(htmlspecialchars($_POST['pseudo'])));
	//récupération pseudo
	$stmt = $dbh->prepare("SELECT * FROM infos_mbr WHERE pseudo = ?");
	$stmt->execute([$_POST['pseudo']]);
	$user = $stmt->fetch();
	if($user && password_verify($_POST['pass'], $user['pass'])) {
			$_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['connect'] = true;
			header('Location: index.php');	
	}
	else {
		header('Location: register.php?error=bad');
		die();
	}
}
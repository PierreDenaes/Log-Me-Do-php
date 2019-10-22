<?php
include 'includes/start.php';
include 'includes/menu.php';
require 'signin.php';
if($_SESSION['connect'] !== true) {
	header('location: accueil.php?error=notLogged');
	exit();
}
?>
<a href="signout.php">Déconnexion</a>
</div>
</body>
</html>
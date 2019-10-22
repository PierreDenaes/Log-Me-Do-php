<?php
include 'includes/start.php';
include 'includes/menu.php';
$titre="Connexion";
?>
<div class="formConnect">
    <h1 class="connect">Connexion</h1>
<form action="signin.php" method="post">
    <div>
        <label for="name">Nom :</label>
        <input type="text" name="pseudo" required="required">
    </div>
    <div>
        <label for="password">Your password :</label>
        <input type="password" name="pass">
    </div>
    <div>
        <input type="submit" name="signIn" value="Sign!">
    </div>
</form>
<a class="linkRegister" href="register.php">Pas encore inscrit ?</a>
</div>

	</div>
</body>
</html>
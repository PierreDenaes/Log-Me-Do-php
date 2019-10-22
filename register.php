<?php
include 'includes/start.php';
include 'includes/menu.php';
include "includes/identifiants.php";
$titre="Enregistrement";
session_start();

if (isset ($_POST['signUp'])) {
    $pseudo = stripslashes(htmlentities(htmlspecialchars($_POST['pseudo'])));
    $email = stripslashes(htmlentities(htmlspecialchars($_POST['email'])));
    // Hachage du mot de passe
    $pass = $_POST['pass'];
    $passHache = password_hash($pass, PASSWORD_DEFAULT);
    $resP = $dbh->query("SELECT * FROM infos_mbr WHERE pseudo='$pseudo'");
    $existPseudo = $resP->rowCount();
    $resE = $dbh->query("SELECT * FROM infos_mbr WHERE email='$email'");
    $existEmail = $resE->rowCount();
    //Insertion du pseudo, password, email dans la base de donnée
                if(is_string($pseudo) == 'true' && is_string($email) == 'true' && $existPseudo == 0 && $existEmail == 0) {
                    $sth = $dbh->prepare("INSERT INTO infos_mbr (pseudo,pass,email) VALUES(?, ?, ?)");
                    //print_r(array($pseudo,$passHache,$email));
                    $sth->execute(array($pseudo,$passHache,$email));
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    $_SESSION['connect'] = true;
                    header('Location: index.php');
                }else {
                    $result2 = "Cette personne existe deja";
                }
}
?>
<div class="formRegister">
    <h1 class="register">Nouvel Utilisateur</h1>
    <form action="register.php" method="post">
        <div>
            <label for="name">* Nom :</label>
            <input type="text" name="pseudo" required="required">
        </div>
        <div>
            <label for="password">* Votre mot de passe :</label>
            <input type="password" name="pass" required="required">
            <label for="confirm">* Confirmer le mot de passe :</label>
            <input type="password" name="confirm" required="required"/>
        </div>
        <div>
            <label for="mail">* Votre e-mail :</label>
            <input type="email" name="email" required="required">
        </div>
        <div>
            <input type="submit" name="signUp" value="Sign!">
        </div>
        <div class="existPeople">
        	<?php 
        echo '<p>'.($result2).'</p>';
        ?>
        </div>
        <a href="accueil.php">Retour à l'accueil</a>
    </form>
</div>
</div>
</body>
</html>
<script src="js/Session.js"></script>
<?php $this->title = "Connexion"; ?>
<h3>Connexion</h3>
<?= $this->session->show('error_login'); ?>
<div>
    <form method="post" action="../public/index.php?route=login">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="login" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>
<script> 
    let session = new Session;
    session.init();
</script>


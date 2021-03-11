<script src="js/Session.js"></script>
<?php include('header.php'); ?>
<?php $this->title = "Connexion"; ?>
<div class="container mt-perso2">
    <h3 class="com_color">Connexion</h3>
    
    <div class="box_connection">
        
        <form method="post" action="../public/index.php?route=login">
            <?= $this->session->show('error_login'); ?>
            <label class="form_color" for="pseudo">Pseudo</label><br>
            <input type="text" id="login" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
            <label class="form_color" for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <input class="btn btn-primary" type="submit" value="Connexion" id="submit" name="submit">
        </form>
    </div>
</div>
<script> 
    let session = new Session;
    session.init();
</script>


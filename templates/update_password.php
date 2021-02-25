<?php $this->title = 'Modifier mot mot de passe'; ?>
<?php include('header.php'); ?>
<div class="container mt-perso">
    <h3>Changer de mot de passe</h3>
    <div>
        <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
        <form method="post" action="../public/index.php?route=updatePassword">
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            <input type="submit" value="Mettre à jour" id="submit" name="submit">
        </form>
    </div>
    <br>
</div>

<?php $this->title = "Inscription"; ?>
<?php include('header.php'); ?>
<div class="container mt-perso2">
    <h3 class="com_color">Inscription</h3>
    <div class="box_connection">
        <form method="post" action="../public/index.php?route=register">
            <label class="form_color" for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
            <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            <label class="form_color" for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            <input class="btn btn-primary" type="submit" value="Inscription" id="submit" name="submit">
        </form>
    </div>
</div>
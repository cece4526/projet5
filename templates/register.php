<?php $this->title = "Inscription"; ?>
<?php include('header.php'); ?>
<div class="container mt-perso2">
    <h3>Inscription</h3>
    <div>
        <form method="post" action="../public/index.php?route=register">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
            <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            <input type="submit" value="Inscription" id="submit" name="submit">
        </form>
    </div>
</div>
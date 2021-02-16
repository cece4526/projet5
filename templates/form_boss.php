<?php
if(isset($boss) && $boss->getId()){
    $route = 'editBoss&bossId='.$boss->getId();
    $submit = 'Mettre à jour'; 
}
else{
    $route = 'addBoss&raidId='.$_GET['raidId'];
    $submit = 'envoyer';
}
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($boss) ? htmlspecialchars($boss->getTitle()): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea id="contentAddArtticle" name="content"><?= isset($boss) ? htmlspecialchars($boss->getContent()): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>
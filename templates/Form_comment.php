<?php
$route = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>

<form method="post" id="formComment" action="../public/index.php?route=<?= $route; ?>&bossId=<?= htmlspecialchars($boss->getId()); ?>">
    <label class="form_color" for="content">Message</label><br>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input class="btn btn-primary" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

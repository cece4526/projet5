<?php $this->title = 'Mon profil'; ?>
<div class="content_center">
    <h3>Profil</h3>
    <?= $this->session->show('update_password'); ?>
    <div class="content_center">
        <h2><?= $this->session->get('pseudo'); ?></h2>
        <p><?= $this->session->get('role'); ?></p>
        <a id="bouton5" href="../public/index.php?route=updatePassword">Modifier son mot de passe</a>
        <br>
        <?php if($this->session->get('role') === 'admin'){ ?>
                <p>compte admin</p>
            <?php }else{?>
                    <a id="bouton5" href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
            <?php } ?>       
    </div>
    <br>
    <a class="bouton4" href="../public/index.php">Accueil</a>
</div>
<?php $this->title = 'Mon profil'; ?>
<?php include('header.php'); ?>
<div class="container mt-perso">
    <div class="content_center">
        <h3 class="com_color">Profil</h3>
        <?= $this->session->show('update_password'); ?>
        <div class="content_center">
            <h4 class="com_color_profile text_align"><?= $this->session->get('pseudo'); ?></h4>
            <p class="com_color_profile text_align"><?= $this->session->get('role'); ?></p>
            <a class="btn btn-primary" href="../public/index.php?route=updatePassword">Modifier son mot de passe</a>
            <br>
            <?php if($this->session->get('role') === 'admin'){ ?>
                    <p class="com_color_profile text_align">compte admin</p>
                <?php }else{?>
                        <a class="btn btn-primary" href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
                <?php } ?>       
        </div>
        <br>
    </div>
</div>
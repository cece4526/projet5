<?php $this->title ="boss"; ?>
<?php include('header.php'); ?>
<div class="container mt-perso">
    <article class="card_home_border card_home_width card_home_color">
        <h2 class="text_align"><?=htmlspecialchars($boss->getTitle());?></h2>
        <p><?= strip_tags($boss->getContent(), '<br><strong><em><p><iframe>');?></p>
        <p><?= htmlspecialchars($boss->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($boss->getCreatedAt());?></p>
    </article>
    <?php if($this->session->get('role') === 'admin') { ?>
        <div class='actions'>
            <a class="btn btn-primary" href="../public/index.php?route=editBoss&bossId=<?= $boss->getId(); ?>">Modifier</a>
            <a class="btn btn-primary" href="../public/index.php?route=deleteBoss&bossId=<?= $boss->getId(); ?>">Supprimer</a>
        </div>
    <?php } ?>

    <div id="comments" class="text-left" style="margin-left: 50px;">
        <?php if($this->session->get('role') === 'user' OR $this->session->get('role') === 'admin') {?>
            <h3 class="com_color">Ajouter un commentaire</h3> 
            <div class="boxh"><?php include('Form_comment.php'); ?></div>
        <?php }?>
        <h3 class="com_color">Commentaires</h3>
        <div class="card_home_border card_home_color margin">
            <h4 id="pseudoCom"></h4>
            <p id="contentCom"></p>
            <p id="dateCom"></p>
        </div>
        <?php
            foreach($allComments as $comment){?>
                <div class="card_home_border card_home_color margin">
                    <h4 id="commentPseudo"><?= htmlspecialchars($comment->getPseudo());?></h4>
                    <p id="commentContent"><?=htmlspecialchars($comment->getContent());?></p>
                    <p id="commentDate">Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
                <?php
                if($comment->isFlag()) {?>
                    <p>Ce commentaire a déjà été signalé</p>
                <?php } 
                elseif ($this->session->get('pseudo') == $comment->getPseudo() OR $this->session->get('role') === 'admin') { ?>
                    <p><a class="btn btn-primary" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
                    <p><a class="btn btn-primary" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
                <?php }  ?>
                </div>
            <?php }
            ;?> 
    </div>
</div>
<script src="../public/js/comments.js"></script>
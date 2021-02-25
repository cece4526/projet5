<?php $this->title = 'Administration'; ?>
<?php include('header.php'); ?>
<div class="container center">
    <div class="content_center">
        <h3 class="com_color">Administration</h3>
        <a class="btn btn-primary" href="../public/index.php?route=addExtension">ajouté un nouvel extension</a>
        <div class="message">
            <p class="message_text">
                <?=$this->session->show('add_boss');?>
                <?= $this->session->show('edit_boss'); ?>
                <?= $this->session->show('delete_boss'); ?>
                <?= $this->session->show('add_comment'); ?>
                <?= $this->session->show('flag_comment'); ?>
                <?= $this->session->show('delete_comment'); ?>
                <?= $this->session->show('delete_user'); ?>
            </p>
        </div>
        <h3 class="com_color">Extensions</h3>
        <?php 
            foreach($allExtension as $extension)
            {
            ?>
                <a class="btn btn-primary" href="../public/index.php?route=extension&extensionId=<?=htmlspecialchars($extension->getId());?>"><?=htmlspecialchars($extension->getTitle());?></a>
                <div class="container tab">
                    
                        <?php 
                        foreach ($extension->getRaids() as $raid){
                            ?>
                            <table class="table-responsive">
                            <tr>
                                <th scope="rowRaid"><a href="../public/index.php?route=raid&raidId=<?=htmlspecialchars($raid->getId());?>"><?= htmlspecialchars($raid->getTitle());?></th>                
                            <?php 
                            foreach ($raid->getAllBoss() as $boss){
                                ?>
                                <tr>
                                    <td scope="col"><a href="../public/index.php?route=boss&bossId=<?=htmlspecialchars($boss->getId());?>"><?= htmlspecialchars($boss->getTitle());?></a></td>
                                </tr>
                                <?php 
                            }?>
                        </tr>
                        </table>     
                        <?php 
                        }?>
                        </tr>
                    </table>
                </div>
            <?php }  ?>

           
        <h3 class="com_color">Commentaires signalés</h3>
        <table class="table-responsive">
            <tr>
                <th scope="row">Id</th>
                <th scope="row">Pseudo</th>
                <th scope="row">Message</th>
                <th scope="row">Date</th>
                <th scope="row">Actions</th>
            </tr>
            <?php
            foreach ($comments as $comment)
            {
                ?>
                <tr>
                    <td scope="col"><?= htmlspecialchars($comment->getId());?></td>
                    <td scope="col"><?= htmlspecialchars($comment->getPseudo());?></td>
                    <td scope="col"><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
                    <td scope="col">Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
                    <td scope="col">
                        <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
                        <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <h2 class="com_color">Utilisateurs</h2>
        <table class="table-responsive">
            <tr class="td_color">
                <th scope="row">Id</th>
                <th scope="row">Pseudo</th>
                <th scope="row">Date</th>
                <th scope="row">Rôle</th>
                <th scope="row">Actions</th>
            </tr>
            <?php
            foreach ($users as $user)
            {
                ?>
                <tr>
                    <td scope="col"><?= htmlspecialchars($user->getId());?></td>
                    <td scope="col"><?= htmlspecialchars($user->getPseudo());?></td>
                    <td scope="col">Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
                    <td scope="col"><?= htmlspecialchars($user->getRole());?></td>
                    <?php if($user->getRole() === 'admin') { ?>
                        <td scope="col">compte admin</td>
                        <?php }else{?>
                        <td scope="col"><a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer le compte</a></td>
                        <?php } ?>    
                    </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
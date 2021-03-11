<?php $this->title ="extension"; ?>
<?php include('header.php'); ?>
<div class="container text_align mt-perso">
    <h2 class="com_color"><?=htmlspecialchars($extensions->getTitle());?></h2>
    <li class="nav-item active"><a class="btn btn-primary" href="../public/index.php?route=administration">Administration</a></li>
    <h3 class="com_color">Raids</h3>
    <?php
        foreach($raids as $raid){
            ?>
            <div class="text_align">
            <a class="btn btn-primary" href="../public/index.php?route=raid&raidId=<?=htmlspecialchars($raid->getId());?>"><?=htmlspecialchars($raid->getTitle());?></a>
            <p class="com_color">crée le <?= htmlspecialchars($raid->getCreatedAt());?></p>
            <p class="com_color">Supprimé le raid</p>
            <a class="btn btn-primary" href="../public/index.php?route=deleteRaid&raidId=<?=htmlspecialchars($raid->getId());?>">supprimé</a>
            </div>
    <?php } ?>
    <h3 class="com_color">Ajouté un Raid</h3>
    <?php include('Form_raid.php'); 
    ?> 
    <h3 class="com_color">Supprimé l'extension</h3>
    <a class="btn btn-primary" href="../public/index.php?route=deleteExtension&extensionId=<?=htmlspecialchars($this->request->getGet()->get('extensionId'));?>">supprimé</a>
    <li class="nav-item active"><a class="btn btn-primary" href="../public/index.php?route=administration">Administration</a></li>
</div>


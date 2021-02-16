<?php $this->title ="raid"; ?>
<div class="text_align">
    <a class="margin btn btn-primary" href="../public/index.php">Accueil</a>
    <h2><?=htmlspecialchars($raids->getTitle());?></h2>
    <a class="margin btn btn-primary" href="../public/index.php?route=addBoss&raidId=<?=htmlspecialchars($raids->getId());?>">Nouveau boss</a>
    <h3>Boss</h3>
</div>
<?php       
foreach($allboss as $boss){
?>  
    <article class=" card card_home_center color_boss" style="background-color: #17b978; border: none;">
        <div class="card_home_border card-body card_home_width card_home_color">
            <h2 class="card-title h2"><?=htmlspecialchars($boss->getTitle());?></h2>
            <p class="card-text"><?=substr(strip_tags($boss->getContent(), "<br><strong><em><p>"), 0, 150);?></p>
            <a href="../public/index.php?route=boss&bossId=<?=htmlspecialchars($boss->getId());?>">lire la suite...</a>            
            <p class="card-text"><?=htmlspecialchars($boss->getAuthor());?></p>
            <p class="card-text"><?=htmlspecialchars($boss->getCreatedAt());?></p>
        </div>        
    </article>
    <br>    
<?php
}
?>
<div class="text_align">
    <a class="margin btn btn-primary" href="../public/index.php">Accueil</a>
</div>
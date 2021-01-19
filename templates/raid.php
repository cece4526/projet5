<?php $this->title ="raid"; ?>
<h2><?=htmlspecialchars($raids->getTitle());?></h2>
<a class="margin bouton4" href="../public/index.php?route=addBoss&raidId=<?=htmlspecialchars($raids->getId());?>">Nouveau boss</a>
<?php       
foreach($allboss as $boss){
?>
    <h3>Boss</h3>
    
    <article class=" card card_home_center color_boss" style="background-color: #cfd3ce; border: none;">
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
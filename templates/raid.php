<?php $this->title ="raid"; ?>
<?php include('header.php'); ?>
<div class="container mt-perso">
    <div class="text_align">
        <h2 class="com_color"><?=htmlspecialchars($raids->getTitle());?></h2>
        <?php
        if($this->session->get('role') === 'admin' || $this->session->get('role') === 'moderateur'){ ?>
            <a class="margin btn btn-primary d_none" href="../public/index.php?route=addBoss&raidId=<?=htmlspecialchars($raids->getId());?>">Nouveau boss</a>
        <?php } ?>
        <h3 class="com_color">Boss</h3>
    </div>
    <?php       
    foreach($allboss as $boss){
    ?>  
    <div class="raid_article">
        <article class=" card card_home_center color_boss card_home_width" style="background-color: #17b978; border: none;">
                <h4 class="card-title h4"><?=htmlspecialchars($boss->getTitle());?></h4>
                <p class="card-text"><?=substr(strip_tags($boss->getContent(), "<br><strong><em><p>"), 0, 150);?></p>
                <a href="../public/index.php?route=boss&bossId=<?=htmlspecialchars($boss->getId());?>">lire la suite...</a>            
                <p class="card-text"><?=htmlspecialchars($boss->getAuthor());?></p>
                <p class="card-text"><?=htmlspecialchars($boss->getCreatedAt());?></p>     
        </article>
    </div> 
        <br>    
    <?php
    }
    ?>
    <div class="text_align">
    </div>
</div>
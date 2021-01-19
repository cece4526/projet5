<?php $this->title ="extension"; ?>
<h2><?=htmlspecialchars($extensions->getTitle());?></h2>
<?php
    foreach($raids as $raid){?>
        <div class="card_home_border card_home_color">
        <p><?=htmlspecialchars($raid->getTitle());?></p>
        <p>Posté le <?= htmlspecialchars($raid->getCreatedAt());?></p>
    <?php } ?>
<h3>Ajouté un Raid</h3>
<?php include('Form_raid.php'); ?> 


<?php $this->title ="extension"; ?>
<h2><?=htmlspecialchars($extensions->getTitle());?></h2>
<h3>Raids</h3>
<?php
    foreach($raids as $raid){
        ?>
        <div>
        <a href="../public/index.php?route=raid&raidId=<?=htmlspecialchars($raid->getId());?>"><?=htmlspecialchars($raid->getTitle());?></a>
        <p>crée le <?= htmlspecialchars($raid->getCreatedAt());?></p>
<?php } ?>
<h3>Ajouté un Raid</h3>
<?php include('Form_raid.php'); 
?> 
<h3>Supprimé l'extension</h3>
<a href="../public/index.php?route=deleteExtension&extensionId=<?=htmlspecialchars($this->request->getGet()->get('extensionId'));?>">supprimé</a>


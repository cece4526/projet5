<h4>boss</h4>
        <a class="margin bouton4" href="../public/index.php?route=addBoss">Nouvel boss</a>
        <table class="table-responsive">
            <?php 
            foreach ($raids as $raid){
            ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($raid->getTitle());?></th>                
                </tr>
                <?php } ?>
            <?php
            foreach ($boss as $boss){
            ?>
                <tr>
                    <td scope="col"><a href="../public/index.php?route=boss&bossId=<?=htmlspecialchars($boss->getId());?>"><?= htmlspecialchars($boss->getTitle());?></a></td>
                </tr>
                <?php } ?>
        </table>

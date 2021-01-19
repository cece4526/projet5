<h4>boss</h4>
        <a class="margin bouton4" href="../public/index.php?route=addboss">Nouvel boss</a>
        <table class="table-responsive">
            <tr>
            <th scope="row">Id</th>
                <th scope="row">Pseudo</th>
                <th scope="row">Contenu</th>
                <th scope="row">Auteur</th>
                <th scope="row">Date</th>
                <th scope="row">Actions</th>
                
            </tr>
            <?php
            foreach ($boss as $boss)
            {
                ?>
                <tr>
                    <td scope="col"><?= htmlspecialchars($boss->getId());?></td>
                    <td scope="col"><?= htmlspecialchars($boss->getTitle());?></a></td>
                    <td scope="col"><?= substr(strip_tags($boss->getContent()), 0, 150);?></td>
                    <td scope="col"><?= htmlspecialchars($boss->getAuthor());?></td>
                    <td scope="col">Créé le : <?= htmlspecialchars($boss->getCreatedAt());?></td>
                    <td scope="col">
                        <a href="../public/index.php?route=editboss&bossId=<?= $boss->getId(); ?>">Modifier</a>
                        <a href="../public/index.php?route=deleteboss&bossId=<?= $boss->getId(); ?>">Supprimer</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

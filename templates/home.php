<?php $this->title="Accueil";?>
<?php include('header.php'); ?>
<div class="container mt-perso-home">
    <div class="message">
        <p class="message_text">
            <?= $this->session->show('register'); ?>
            <?= $this->session->show('login'); ?>
            <?= $this->session->show('logout'); ?>
            <?= $this->session->show('delete_account'); ?>
            <?= $this->session->show('add_comment'); ?>
            <?= $this->session->show('flag_comment'); ?>
            <?= $this->session->show('delete_comment'); ?>
        </p>
    </div>

    <div id="container_caroussel">
        <div class="carousel" style="display: none;">
        <div class="carousel__panorama">
                <div class="item"></div>
                <div class="item"></div>
            </div>
        </div>
        <div id="carousel1">
            <div class="item">
                <figure class="item__image">
                    <img src="images/shadowland.jpg" alt="">
                        <figcaption class="btn btn-primary">
                        <a href="https://www.mamytwink.com/actualite/correctifs-du-6-fevrier-2021-bug-pour-les-outils-de-niya-bardanes">
                        Mise à Jour et Correctifs</a>
                        </figcaption>
                    </img>
                </figure>
            </div>
            <div class="item">
                <figure class="item__image">
                    <img src="images/nathria.jpg" alt="">
                    <figcaption class="btn btn-primary"><a href="index.php?route=raid&raidId=23">Chateau de Nathria</a></figcaption>
                </figure>               
            </div>
        </div>
    </div>
</div>
<script type="module" src="js/main.js"></script>

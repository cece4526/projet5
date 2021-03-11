<?php $this->title ="menu";
if ($this->request->getGet()->get('route') === null){
    if ($this->session->get('pseudo')) {
        ?>
        <nav id="menu_dir" class="col navbar navbar-expand-lg">
            <button id="button_menu" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="button">Menu</span>
            </button>
            <div id="navbarContent" class="collapse navbar-collapse menu_dir">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class=" nav-link" href="../public/index.php?route=logout">Déconnexion</a></li>
                    <li class="nav-item active"><a class=" nav-link" href="../public/index.php?route=profile">Profil</a></li>
                    <?php 
                    foreach($allExtension as $extension)
                    {
                        foreach ($extension->getRaids() as $raid){ ?>
                            <li class="deroulant "><a class=" nav-link" href="../public/index.php?route=raid&raidId=<?=htmlspecialchars($raid->getId());?>"><?= htmlspecialchars($raid->getTitle());?></a>               
                            <ul class="sous ">
                            <?php foreach ($raid->getAllBoss() as $boss){ ?>
                                        <li class="nav-item nav-background"><a class=" nav-link " href="../public/index.php?route=boss&bossId=<?=htmlspecialchars($boss->getId());?>"><?= htmlspecialchars($boss->getTitle());?></a></li> 
                                <?php 
                            } ?>
                            </ul> </li>    
                        <?php    
                        } 
                }  
                     if($this->session->get('role') === 'admin' || $this->session->get('role')=== 'moderateur') { ?>
                    <li class="nav-item active"><a class=" nav-link" href="../public/index.php?route=administration">Administration</a></li>
                </ul>
            </div>
            <?php } ?>
        </nav>
        <?php
    } 
    else {
        ?>
        <nav id="menu_dir" class="col navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="button">Menu</span>
            </button>
            <div id="navbarContent" class="collapse navbar-collapse menu_dir">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class=" nav-link " href="../public/index.php?route=register">Inscription</a></li>
                    <li class="nav-item active"><a class=" nav-link " href="../public/index.php?route=login">Connexion</a></li>
                </ul>
            </div>
        </nav>
        <?php
    }
}
else{
    ?>
        <nav id="menu_dir" class="col navbar navbar-expand-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                <span class="button">Menu</span>
            </button>
            <div id="navbarContent" class="collapse navbar-collapse menu_dir">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="../public/index.php">Accueil</a></li>
                </ul>
            </div>
        </nav>
        <?php
    
}

?>
<?php $this->title = "Modifier l'boss"; ?>
<?php include('header.php'); ?>
<script>
      tinymce.init({selector: '#contentAddArtticle',
        plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help'
        ],
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullpage | ' +
        'forecolor backcolor emoticons | help',
        menu: {
        favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help'
      });</script>
<div class="container mt-perso">
    <h3>Editer un boss</h3>
    <div>
        <?php include('form_boss.php');?>
    </div>
</div>
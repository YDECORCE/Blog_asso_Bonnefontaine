<?php
require_once('controleur/controleur.php');
require_once('models/functions.php');
include('public/header.php');
?>
<div class="container">
    <form method=get action="" id="addpost">
        <div class="form-group">
            <input type="text my-5" placeholder="titre de l'article" name="title" class="form-control"></input>
            <input type="textarea my-5" placeholder="contenu" rows="10" name="content" class="form-control"></input>
            <?php select_list_authors() ?>
            <button class="btn btn_jaune btn-primary my-2" type="submit" name="action"
                value="soumettre">Ajouter</button>
    </form>

</div>




<?php
include('public/footer.php');
?>
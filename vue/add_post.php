<?php
require '../models/functions.php';
if ( isset($_FILES['fic']) )
{
    transfert();
}
?>
<h3>Envoi d'une image</h3>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=50 />
         <input type="submit" value="Envoyer" />
      </form>

<?php

?>
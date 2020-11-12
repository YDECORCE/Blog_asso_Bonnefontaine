<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <?php
         require 'models/functions.php';
         $bdd=connect();
         $req = "SELECT img_name_images, ID_images FROM images ORDER BY img_name_images";
         $ret = $bdd->query($req) or die (mysql_error ());
         while ( $col = $ret->fetch()) 
         {
             echo "<a href=\"apercu.php?id=" . $col['ID_images'] . "\">" . $col['img_name_images'] . "</a><br />";
         }
      ?>
   </body>
</html>
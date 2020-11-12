<?php
    
    if ( isset($_GET['id']) )
    {
        $id = intval ($_GET['id']);
        require 'models/functions.php';
        $bdd=connect();
        $req = "SELECT * FROM images WHERE ID_images=".$id;
        $ret = $bdd->query($req) or die;
        while ($col = $ret->fetch())
        {
            header ("Content-type: " . $col['img_type_images']);
            echo $col['img_blob_images'];      
        }
    }
         else 
         {
        echo "Mauvais id d'image";
        }
    

?>
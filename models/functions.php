<?php
function connect() //connexion to database
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog_bonnefontaine;port=3306;charset=utf8', 'root', '');
            return $bdd;
         
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    
function add_author()//add author to database
    {

    } 
function add_post()// add post to database
    {

    }
function transfert() //upload an image file
    {
    $ret        = false;
    $img_blob   = '';
    $img_taille = 0;
    $img_type   = '';
    $img_nom    = '';
    $taille_max = 250000;
    $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
    
    if (!$ret) {
        echo "Problème de transfert";
        return false;
    } else {
        // Le fichier a bien été reçu
        $img_taille = $_FILES['fic']['size'];
        
        if ($img_taille > $taille_max) {
            echo "Trop gros !";
            return false;
        }

        $img_type = $_FILES['fic']['type'];
        $img_nom  = $_FILES['fic']['name'];
        $bdd=connect();
        $img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
        $req = "INSERT INTO images (" . 
                                "img_name_images, img_weight_images, img_type_images, img_blob_images " .
                                ") VALUES (" .
                                "'" . $img_nom . "', " .
                                "'" . $img_taille . "', " .
                                "'" . $img_type . "', " .
                                "'" . addslashes ($img_blob) . "') "; // N'oublions pas d'échapper le contenu binaire
        $ret = $bdd->query($req) or die (mysql_error ());
        return true;
    }
    }


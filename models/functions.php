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
    
function add_author($name, $firstname)//add author to database
    {
    $bdd=connect();
    $req=$bdd->prepare('INSERT INTO `authors`(`name_authors`, `firstname_authors`) VALUES (:nom,:prenom)');
    $req->bindParam(':nom', $name,PDO::PARAM_STR);
    $req->bindParam(':prenom', $firstname,PDO::PARAM_STR);
    $validation=$req->execute();
    if($validation)
                {
                    return 'votre enregistrement a été ajouté avec succès';
                } 
                else 
                {
                    return 'Veuillez recommencer svp, une erreur est survenue';
                }



    } 
function add_post($id_author,$title,$content)// add post to database
    {
        $bdd=connect();
        $req=$bdd->prepare('INSERT INTO `posts`(`title_posts`, `content_posts`, `ID_authors`) VALUES (:title,:content,:id)');
        $req->bindParam(':title', $title,PDO::PARAM_STR);
        $req->bindParam(':content', $content,PDO::PARAM_STR);
        $req->bindParam(':id', $id_author,PDO::PARAM_STR);
        $validation=$req->execute();
        if($validation)
                    {
                        return 'votre enregistrement a été ajouté avec succès';
                    } 
                    else 
                    {
                        return 'Veuillez recommencer svp, une erreur est survenue';
                    }
    
    }
function viewallposts() //select all posts from database
    {
    $bdd=connect();
    $req=$bdd->prepare('SELECT * FROM posts INNER JOIN authors ON posts.ID_authors=authors.ID_authors');
    $req->execute();
    return $req;
    }
function viewonepost($id)//Select 1 post from database
    {
    $bdd=connect();
    $req=$bdd->prepare('SELECT * FROM `posts` INNER JOIN `authors` ON posts.ID_authors=authors.ID_authors WHERE posts.ID_posts='.$id.'');
    $req->execute();
    return $req;
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
function select_list_authors() // list of authors for add post view
    {
    $bdd=connect();
    $reponse = $bdd->query('SELECT * FROM authors');
    echo'<select class="custom-select my-2" name="id">';
    echo'<option value="NULL">Choisir l\'auteur</option>';
    while ($donnees = $reponse->fetch()) {
        echo'<option value='.$donnees['ID_authors'].'>'.$donnees['firstname_authors'].' '.$donnees['name_authors'].' </option>';
    }
    echo'</select>';
    }

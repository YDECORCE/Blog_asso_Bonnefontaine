<?php
while ($datas=$view->fetch())
{
    echo '<div class="col-12 blog">
    <h2>'.$datas['title_posts'].'</h2>
    <p>'.$datas['content_posts'].'</p>
    <p>'.$datas['firstname_authors'].' '.$datas['name_authors'].'</p>
    <a href="index.php">retour</a></div>';
}
?>


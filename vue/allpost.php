<?php
while ($datas=$views->fetch())
{
    $resume=substr($datas['content_posts'],0,149).'...';
    echo '<div class="col-12 blog">
    <h2>'.$datas['title_posts'].'</h2>
    <p>'.$resume.'</p>
    <p>'.$datas['firstname_authors'].' '.$datas['name_authors'].'</p>
    <a href="index.php?action=viewone&id='.$datas['ID_posts'].'">Détails</a></div>';
}
?>

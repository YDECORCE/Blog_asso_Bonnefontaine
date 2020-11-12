<?php
require_once('models/functions.php');
function addpost()// adding post to database by controleur
    {
        include('vue/addpost.php');
        if (!empty('action')&&($_GET['action']=="soumettre")){
            $id=$_GET['id'];
            $title=$_GET['title'];
            $content=$_GET['content'];
            // echo $id;
            // echo $title;
            // echo $content;
            // die;
            $result=add_post($id,$title,$content);
            include 'vue/validation.php';
        }
        
    }
function view_all_posts() //generate all the views from database
    {
    $views=viewallposts();
    include 'vue/allpost.php';
    }

function view_one_post($id) //Genrate one view from database
 {
     $view=viewonepost($id);
     include 'vue/onepost.php';
 }   
?>
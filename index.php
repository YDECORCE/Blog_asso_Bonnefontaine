<?php 
include('public\header.php');
require('controleur/controleur.php');
require_once('models/functions.php');

   if (isset($_GET['action'])&&!empty('action')&&$_GET['action']=='viewone'){
      $id=$_GET['id'];
      view_one_post($id);
   }
   else {
      view_all_posts();
   }

include('public/footer.php');
   ?>

<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';
include_once 'classes/User.php';

if (isset($_POST['newpost'])) {
    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];
        $db = new DataBase();

        //if (is_file('utilisateur/' . $user . '.txt')) {
        $contenu = $db->readUser($user);

        
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $db->createPost(new Post($post['title'], $post['description'], $post['price'], $contenu, $post['categories'], $post['localisation'], $post['type']));
           header("location:index.php");
        }
    //}
} else {
    echo 'pas d\'article';
}


    
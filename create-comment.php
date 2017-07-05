<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';
include_once 'classes/User.php';
include_once 'classes/Comment.php';
$instance = new DataBase();


if (isset($_GET['annonce'])) {
    $url = htmlspecialchars($_GET['url']);
    $title = htmlspecialchars($_GET['filename']);
    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];

        if (is_file('posts/' . $title . '.txt')) {
            $posdata = $instance->readPost($title);
        }

        if (is_file('utilisateur/' . $user . '.txt')) {
            $userdata = $instance->readUser($user);
            $post = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $instance->createComment(new Comment($post['title'], $post['comm'], $post['note'], $userdata, $posdata));
            header("location: $url");
        }
    }
} else {
    echo 'pas d\'article';
}



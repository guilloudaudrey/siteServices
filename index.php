<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">      
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Index</title>
        <style>

            h1{
                text-align: center;
            }
            .recherche{
                text-align: center;
            }
        </style>
    </head>
    <body>

        <?php
        
        session_start();
       $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (!isset($_SESSION['nom'])) {
            ?>

            <form method="POST" action="login.php">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo"/>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp"/>
                <input type="submit" name="login"/>
                <input type="hidden" name="url" value="<?php echo $url; ?>"/>
            </form>


            <a href="register-form.php">S'inscrire</a>
            <a href="post_form.php">Poster une annonce</a>

            <?php 
        } else {
            echo 'Bonjour ' . $_SESSION['nom'];
            echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
            echo '<a href="espaceperso.php">Espace personnel</a><br/>';
            echo '<a href="post_form.php">Poster une annonce</a>';
        }
        ?>

        <h1>Accueil</h1>
        <form class="recherche" method="POST" action="index.php">
            <select name ="categories">
                <option value="toutescategories" selected="selected">Toutes les catégories</option>
                <option value="animaux">Animaux</option>
                <option value="artisanat">Artisanat</option>
                <option value="cours" >Cours</option>
                <option value="enfants">Garde d'enfants</option>
                <option value="informatique">Informatique</option>
            </select>
            <input type="text" placeholder="mot-clé"/>
            <input type="text" placeholder="Localisation"/>
            <input type="submit" value="Rechercher" name="search"/>
        </form>

        <?php
        include_once 'classes/Post.php';
        include_once 'classes/DataBase.php';
        $instance = new DataBase();
        $listeAnnonces = $instance->readPostsList();



        if (isset($_POST['search'])) {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $inputcat = $post['categories'];

            foreach ($listeAnnonces as $annonce) {
                $categorie = $annonce->getCategorie();

                if ($categorie == $inputcat) {
                    echo $annonce->asHtml();
                    echo '<form action="annonce.php" method="GET">'
                    . '<input type="submit" value="en savoir plus"><br/>'
                    . '<input type="hidden" name="filename" value="' . $annonce->getTitle() . '"></form>';
                } else if ($inputcat == "toutescategories") {
                    echo $annonce->asHtml();
                    echo '<form action="annonce.php" method="GET">'
                    . '<input type="submit" value="en savoir plus"><br/>'
                    . '<input type="hidden" name="filename" value="' . $annonce->getTitle() . '"></form>';
                }
            }
        } else {

            foreach ($listeAnnonces as $annonce) {
                $categorie = $annonce->getCategorie();
                echo $annonce->asHtml();
                echo '<form action="annonce.php" method="GET">'
                . '<input type="submit" value="en savoir plus"><br/>'
                . '<input type="hidden" name="filename" value="' . $annonce->getTitle() . '"></form>';
            }
        }
        ?>
    </body>
</html>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        include_once 'classes/User.php';
        include_once 'classes/DataBase.php';
        include_once 'classes/Post.php';
        include_once 'classes/Comment.php';

        $instance = new DataBase;


        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];

            $contenu = $instance->readUser($user);

            echo $contenu->asHtml();
            echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
            echo '<a href="post_form.php">Créer une nouvelle annonce</a><br/>';
            echo '<a href="index.php">Index</a>';
        } else {
            include_once 'html/connexion-html.php';
        }
        ?>

        <h2>Mes annonces</h2>

        <?php
        include_once 'classes/Post.php';
        include_once 'classes/DataBase.php';
        include_once 'classes/User.php';

        $listeAnnonces = $instance->readPostsList();
        foreach ($listeAnnonces as $annonce) {
            $author = $annonce->getAuthor();

            if ($author == $user) {
                echo $annonce->asHtml();

                echo'

            <div class="boutons">
            <form method="POST" action="delete.php">
            <input type="hidden" name="filename" value="' . $annonce->getTitle() . '" class="text">
            <input type="submit" value="supprimer">
            </form>
    
            <form method="POST" action="edit_form.php">
            <input type="hidden" name="filename" value="' . $annonce->getTitle() . '">
                <input type="submit" value="modifier">
            </form>
            </div>';
            }
        }
        ?>
        <h2>Evaluations émises</h2>
        <?php
        $listecomm = $instance->readCommentsList();
        $listepost = $instance->readPostsList();

        foreach ($listecomm as $comm) {
            if ($user == $comm->getAuthor()) {

                echo $comm->asHtml();
            }
        }
        ?>
        <h2>Evaluations reçues</h2>
        <?php
            foreach ($listepost as $post) {
           
                if ($user == $post->getAuthor()) {
             
                    echo $comm->asHtml();
                }
            }
        
        ?>
    </body>
</html>
<?php

class Post {

    protected $title;
    protected $categorie;
    protected $photo;
    protected $date;
    protected $description;
    protected $localisation;
    protected $price;
    protected $author;
    protected $typeannonce;
    protected $datetitre;

    function __construct($title, $photo, $description, $price, User $author, $categorie, $localisation, $typeannonce) {
        $this->title = $title;
        $this->photo = $photo;
        $this->date = new DateTime();
        $this->description = $description;
        $this->price = $price;
        $this->author = $author->getPseudo();
        $this->categorie = $categorie;
        $this->localisation = $localisation;
        $this->typeannonce = $typeannonce;
        $this->datetitre = new DateTime();
    }

    function getDatetitre() {
        return $this->datetitre->format('dmyhis');
    }

    function getTitle() {
        return $this->title;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getDate() {
        return $this->date;
    }

    function getDescription() {
        return $this->description;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function getTypeannonce() {
        return $this->typeannonce;
    }

    function getPrice() {
        return $this->price;
    }

    function getAuthor() {
        return $this->author;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    public function asHtml() {
        return
        '<figure class="pull-left col-sm-5 col-md-5"><img src="images/travaux.png"></figure>'

        . '<span class="badge badge-info">' . $this->getTypeannonce() . '</span>'
        . '<h3>' . $this->getTitle() . '</h3>'
        . '<p>'.$this->getDescription().'</p>'
        . '<p>'.$this->getPrice() .' €</p>'.
        '<p>' .$this->getDate()->format('d/m/y H:i').'</p>'
        . '<p>Auteur : ' . $this->getAuthor().'</p>'
        . '<p>Catégorie : ' .
        $this->getCategorie() . 'Localisation : ' .
        $this->localisation;
    }

}

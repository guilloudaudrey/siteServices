<?php

class User {

    private $pseudo;
    private $mdp;
    private $genre;
    private $age;
    private $dateinscription;
    private $nom;
    private $prenom;
    private $CP;
    private $ville;
    private $mail;
    private $telephone;
    private $id;

    function __construct($pseudo, $mdp, $genre, $age, $nom, $prenom, $mail, $telephone, $CP, $ville, int $id = NULL) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->genre = $genre;
        $this->age = $age;
        $this->dateinscription = date("Y-m-d à H:i");;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->telephone = $telephone;
        $this->CP = $CP;
        $this->ville = $ville;
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getGenre() {
        return $this->genre;
    }

    function getAge() {
        return $this->age;
    }

    function getDateinscription() {
        return $this->dateinscription;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setAge($age) {
        $this->age = $age;
    }

    public function getData() {
        return $this->mdp;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getCP() {
        return $this->CP;
    }

    function getVille() {
        return $this->ville;
    }

    function getMail() {
        return $this->mail;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setCP($CP) {
        $this->CP = $CP;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function asHtml() {
        return '<div class="row"><div class="container col-lg-10" style="margin:80px"><p><img src="images/profil.png" width= 120px>'.$this->getPseudo() . '</p>'
                .'<p>'.$this->getDateinscription() . 'Sexe : </p><p>' .
                $this->getGenre() . 'Age : </p><p>' .
                $this->getAge() . 'Prénom : </p><p>' .
                $this->prenom . 'Nom : </p><p>' .
                $this->nom . 'Mail : </p><p>' .
                $this->mail . 'Téléphone : </p><p>' .
                $this->telephone . 'CP : </p><p>' .
                $this->CP . 'Ville : </p><p>' .
                $this->ville.'</p></div></div>' ;
    }

}

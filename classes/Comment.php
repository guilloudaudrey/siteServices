<?php

class Comment {

    private $texte;
    private $note;
    private $date;
    private $author;
    private $article;
    // private $id;
    private $destinataire;

    function __construct($texte, $note, $date, $author, $article) {
        $this->author = $author;
        $this->article = $article;
        $this->texte = $texte;
        $this->note = $note;
        $this->date = $date;
    }

    function getDestinataire() {
        return $this->destinataire;
    }

    function setDestinataire($destinataire) {
        $this->destinataire = $destinataire;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getDate() {
        return $this->date;
    }

    function getAuthor() {
        return $this->author;
    }

    function getArticle() {
        return $this->article;
    }

    function getTexte() {
        return $this->texte;
    }

    function getNote() {
        return $this->note;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setArticle($article) {
        $this->article = $article;
    }

    function setTexte($texte) {
        $this->texte = $texte;
    }

    function setNote($note) {
        $this->note = $note;
    }

    public function asHtml() {
        return '<div style="border: 1px solid lightgrey; padding: 10px;margin-top:5px; margin-bottom:5px">
                    <p style="font-weight:bold">' . $this->getTexte() . '</p>
                    <p>Note : ' . $this->getNote() . '/5 </p>
                        <section style="color:darkgrey; line-height:0.9em">
                    <p>auteur : ' . $this->getAuthor() . '</p>
                    <p>date : ' . $this->getDate() . '</p>
                        </section>
                </div>';
    }

}

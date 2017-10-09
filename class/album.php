<?php
class album {
    protected $id;
    protected $nom;
    protected $annee;
    protected $genre;


    public function __construct($id, $nom, $annee, $genre)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setAnnee($annee);
        $this->setGenre($genre);
    }

    //////////////////////////////////////////////////////
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    //////////////////////////////////////////////////////
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    //////////////////////////////////////////////////////
    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }
    ///////////////////////////////////////////////////////
    public function getGenre()
    {
        return $this->genre;
    }
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
    ///////////////////////////////////////////////////////

    public function __toString()
    {
        return "Id :".$this->id."|| Nom : ".$this->nom."|| Année : ".$this->annee."|| Genre : ".$this->genre;
    }
}

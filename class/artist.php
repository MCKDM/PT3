<?php
class artist {
    protected $id;
    protected $nom;
    private $lesAlbums;

    public function __construct($id =null, $nom=null)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->lesAlbums=array();
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
    public function getLesAlbums()
    {
        return $this->lesAlbums;
    }

    //////////////////////////////////////////////////////
    public function __toString()
    {
        return "<b>Id</b> : ".$this->id." | <b>Nom</b> : ".$this->nom;
    }
    //////////////////////////////////////////////////////

    public function AjouteAlbum($album)
    {
        $this->lesAlbums[]=$album;
    }



}

<?php
class ArtistManager{
    protected $pdo;

    public function __CONSTRUCT($pdo){
        $this->pdo = $pdo;
    }

    public function getArtistes(){
        $query = $this->pdo->query("SELECT * FROM artist");
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"artist");
    }

    public function searchArtiste($data){
        if(is_int($data)){
			$query = $this->pdo->prepare("SELECT * FROM artist WHERE id= :data");
		} else {
			$query = $this->pdo->prepare("SELECT * FROM artist WHERE LOWER(nom) = :data");
		}
        $query->execute(array("data" => htmlspecialchars($data)));
        return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"artist");
    }

	public function artistExiste($data){
		$tablo = self::searchArtiste($data);
		return (isset($tablo[0])) ? TRUE : FALSE;
	}

	public function addArtiste($nom){
		if(!self::artistExiste($nom)){
			$query = $this->pdo->prepare("INSERT INTO artist(nom) VALUE(:nom)");
			$query->execute(array("nom" => $nom));
			return array(1, "Ajout réussi");
		} else {
			return array(0, "Un artise possède déjà ce nom");
		}
	}
}

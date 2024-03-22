<?php
class entree {
    public $libelle;
    public $description;
    public $prix;
    public $image;
    private $id;
    private $id_categorie;
    private $active;

    public function __construct($libelle=null, $description=null, $prix=null, $image=null, $id=null, $id_categorie=null, $active=null) {
        
        $this-> libelle = $libelle;
        $this-> description = $description;
        $this-> prix = $prix;
        $this-> image = $image;
        $this-> id = $id;
        $this-> id_categorie = $id_categorie;
        $this-> active = $active ;
    }

    public function getLibelleEntree () {
        return $this->libelle;
    }
    public function setLibelleEntree ($libelle) {
        $this->libelle = $libelle;
        return $this;
    }


    public function getDescriptionEntree () {
        return $this->description;
    }
    public function setDescriptionEntree ($description) {
        $this->description = $description;
        return $this;
    }


    public function getPrix () {
        return $this->prix;
    }
    public function setPrix ($prix) {
        $this->prix = $prix;
        return $this;
    }


    public function getImage () {
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
        return $this;
    }

    public function getIdEntree () {
        return $this->id;
    }
    public function setIdEntree ($id){
        $this->id = $id;
        return $this;
    }

    public function getIdCategorie () {
        return $this->id_categorie;
    }
    public function setIdCategorie($id_categorie){
        $this->id_categorie = $id_categorie;
        return $this;
    }

    public function getActive () {
        return $this->active;
    }
    public function setActive($active) {
        $this-> active = $active;
        return $this;
    }




public function affichage_entree() {
    echo ' 
    <div class="card">
      <img src="' . $this->getImage() . '" alt="' . $this->getLibelleEntree() . '">
      <div class="card-details">
        <p>'. $this->getLibelleEntree().'</p>
        <p>'. $this->getDescriptionEntree().'</p>
        <button>Commander</button>
    </div>
  </div>
  ';
}
}
?>
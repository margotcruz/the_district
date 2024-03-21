<?php

class categorie {
    public $image_mobile;
    public $image_desktop;
    public $libelle;
    private $id;
    private $active;

    public function __construct($id=null, $libelle=null, $image_mobile=null, $image_desktop=null, $active=null){
        $this->id = $id;
        $this->libelle  = $libelle;
        $this->image_mobile = $image_mobile;
        $this->image_desktop = $image_desktop;
        $this->active = $active;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getLibelle(){
        return $this->libelle;
    }
    
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
        return $this;
    }

    public function getImage_mobile(){
        return $this->image_mobile;
    }
    
    public function setImage_mobile($image_mobile) {
        $this->image_mobile= $image_mobile;
        return $this;
    }
    
    public function getImage_desktop(){
        return $this->image_desktop;
    }
    
    public function setImage_desktop($image_desktop) {
        $this->image_desktop;
    }

    public function getActive(){
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
        return $this;
    }

    public function affichage_categorie_desktop(){
        echo '<div class="col-lg-2 mb-2 col-md-4 d-none d-md-flex">
        <div class="card">
            <div class="container p-0">
                <img src="'. $this->getImage_desktop() .'" class="card-img-top" alt="' . $this->getLibelle() . '">
                <h5 class="card-title p-3">' . $this->getLibelle() . '</h5>
            </div>
            <div class="card-body mx-auto">
                <a href="plat-par-categorie.php?id='. $this->getId() .'" class="btn btn-primary">Découvrir</a>
            </div>
        </div>
    </div>';
    }
    

    public function affichage_categorie_mobile(){
        echo '<div class=" container">
        <a href="plat-par-categorie.php?id='. $this->getId() .'" class="imagine-link position-relative">
            <img src="'. $this->getImage_mobile() .'" alt="' . $this->getLibelle() . '" class="img-fluid mb-4 img-accueil-mobile">
            <h4 class="image-title position-absolute">' . $this->getLibelle() . '</h4>
        </a>
    </div>';
    }

    
        
    } 


?>

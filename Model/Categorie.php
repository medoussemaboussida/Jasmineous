<?php

    class Categorie
    {

        private $id_cat;
        private $nom_cat;

        //Constructor
        public function __construct($id_cat, $nom_cat)
        {
            $this->id_cat=$id_cat;
            $this->nom_cat=$nom_cat;
        }

        //Getters
        public function get_id_cat()
        {
            return $this->id_cat;
        }
        
        public function get_nom_cat()
        {
            return $this->nom_cat;
        }

        //Setters
        public function set_nom_cat(string $nom_cat)
        {
            $this->nom_cat=$nom_cat;
        }

    }

?>

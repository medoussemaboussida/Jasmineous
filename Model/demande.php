<?php

	class demande
	{
		
		private $id_u;
		private $id_demande;
		private $hauteur;
		private $age;
		private $poids;
		
        
        
		
		//Constructor
		public function __construct($id_u, $id_demande, $hauteur, $age, $poids)
		{
			$this->id_u=$id_u;
			$this->id_demande=$id_demande;
			$this->hauteur=$hauteur;
			$this->age=$age;
			$this->poids=$poids;
		
		}

		//Getters
		public function get_id_u()
		{
			return $this->id_u;
		}

		public function get_id_demande()
		{
			return $this->id_demande;
		}

		public function get_hauteur()
		{
			return $this->hauteur;
		}

		public function get_age()
		{
			return $this->age;
		}

		public function get_poids()
		{
			return $this->poids;
		}

		//Setters
		/*public function set_type_seance(string $type_seance)
		{
			$this->type_seance=$type_seance;
		}

		public function set_dure_seance(int $dure_seance)
		{
			$this->dure_seance=$dure_seance;
		}

		public function set_nbr_maximal(int $nbr_maximal)
		{
			$this->nbr_maximal=$nbr_maximal;
		}

		public function set_categorie(string $categorie)
		{
			$this->categorie=$categorie;
		}

		public function set_image_seance(string $image_seance)
		{
			$this->image_seance=$image_seance;
		}
	*/
	}

?>
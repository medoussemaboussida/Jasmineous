<?php

	class program
	{
		
		private $id_demande;
		private $type_demande;
		private $Desc_diet;
		private $Desc_workout;

		
		//Constructor
		public function __construct($id_demande, $type_demande, $Desc_diet, $Desc_workout)
		{
			$this->id_demande=$id_demande;
			$this->type_demande=$type_demande;
			$this->Desc_diet=$Desc_diet;
			$this->Desc_workout=$Desc_workout;
			
		}

		//Getters
		public function get_id_demande()
		{
			return $this->id_demande;
		}

		public function get_type_demande()
		{
			return $this->type_demande;
		}

		public function get_Desc_diet()
		{
			return $this->Desc_diet;
		}

		public function get_Desc_workout()
		{
			return $this->Desc_workout;
		}


		/*//Setters
		public function set_type_seance(string $type_seance)
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
		}*/
		
	}

?>
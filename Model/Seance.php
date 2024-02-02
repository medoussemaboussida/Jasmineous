<?php

	class seance
	{
		
		private $id_seance;
		private $type_seance;
		private $dure_seance;
		private $nbr_maximal;
		private $categorie;
		private $image_seance;
		
		//Constructor
		public function __construct($id_seance, $type_seance, $dure_seance, $nbr_maximal, $categorie, $image_seance)
		{
			$this->id_seance=$id_seance;
			$this->type_seance=$type_seance;
			$this->dure_seance=$dure_seance;
			$this->nbr_maximal=$nbr_maximal;
			$this->categorie=$categorie;
			$this->image_seance=$image_seance;
		}

		//Getters
		public function get_id_seance()
		{
			return $this->id_seance;
		}

		public function get_type_seance()
		{
			return $this->type_seance;
		}

		public function get_dure_seance()
		{
			return $this->dure_seance;
		}

		public function get_nbr_maximal()
		{
			return $this->nbr_maximal;
		}

		public function get_categorie()
		{
			return $this->categorie;
		}

		public function get_image_seance()
		{
			return $this->image_seance;
		}

		//Setters
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
		}
		
	}

?>
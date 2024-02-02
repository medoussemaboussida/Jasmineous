<?php

	class reservation
	{
		
		private $id_reservation;
		private $type_reservation;
		private $username;
		private $email;
		private $date_reservation;
		private $phone;
		private$id_seance;
        
        
		
		//Constructor
		public function __construct($id_reservation, $type_reservation, $username, $email, $date_reservation, $phone,$id_seance)
		{
			$this->id_reservation=$id_reservation;
			$this->type_reservation=$type_reservation;
			$this->username=$username;
			$this->email=$email;
			$this->date_reservation=$date_reservation;
			$this->phone=$phone;
			$this->id_seance=$id_seance;
		}

		//Getters
		public function get_id_reservation()
		{
			return $this->id_reservation;
		}

		public function get_type_reservation()
		{
			return $this->type_reservation;
		}

		public function get_username()
		{
			return $this->username;
		}

		public function get_email()
		{
			return $this->email;
		}

		public function get_date_reservation()
		{
			return $this->date_reservation;
		}

		public function get_phone()
		{
			return $this->phone;
		}
		public function get_id_seance()
		{
			return $this->id_seance;
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
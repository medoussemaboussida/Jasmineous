<?php

	class panier
	{
		
		private $id_panier;
		private $namee;
		private $quantite;
		private $prix_total;
		
		
		//Constructor
		public function __construct($id_panier,$namee,$quantite, $prix_total )
		{
			$this->id_panier=$id_panier;
			$this->namee=$namee;
			$this->quantite=$quantite;
			$this->prix_total=$prix_total;
			
		}

		//Getters
		public function get_id_panier()
		{
			return $this->id_panier;
		}

		public function get_namee()
		{
			return $this->namee;
		}

		public function get_quantite()
		{
			return $this->quantite;
		}

		public function get_prix_total()
		{
			return $this->prix_total;
		}
		//Setters
		
		public function set_namee(string $namee)
		{
			$this->namee=$namee;
		}

		
		public function set_quantite(int $quantite)
		{
			$this->quantite=$quantite;
		}

		public function set_prix_total(int $prix_total)
		{
			$this->prix_total=$prix_total;
		}

		
	}

?>
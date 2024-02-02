<?php

	class commande
	{
		
		private $panier;
		private $id_commande;
		private $pay;
		private $adda;
		private $code_post;
		private $f_name;
        private $l_name;
        private $tel;
		
		//Constructor
		public function __construct($panier, $id_commande, $pay, $adda, $code_post, $f_name,$l_name,$tel)
		{
			$this->panier=$panier;
			$this->id_commande=$id_commande;
			$this->pay=$pay;
			$this->adda=$adda;
            $this->code_post=$code_post;
			$this->f_name=$f_name;
            $this->l_name=$l_name;
            $this->tel=$tel ;
		}

		//Getters
		public function get_id_commande()
		{
			return $this->id_commande;
		}

		public function get_panier()
		{
			return $this->panier;
		}

		public function get_pay()
		{
			return $this->pay;
		}

		public function get_adda()
		{
			return $this->adda;
		}

		public function get_code_post()
		{
			return $this->code_post;
		}

		public function get_f_name()
		{
			return $this->f_name;
		}
        public function get_l_name()
		{
			return $this->l_name;
		}
        public function get_tel()
		{
			return $this->tel;
		}
		//Setters
		public function set_pay(string $pay)
		{
			$this->pay=$pay;
		}

		public function set_adda(string $adda)
		{
			$this->adda=$adda;
		}

		public function set_code_post(string $code_post)
		{
			$this->code_post=$code_post;
		}
        public function set_f_name(string $f_name)
		{
			$this->date=$date;
		}
        public function set_l_name(string $l_name)
		{
			$this->date=$date;
		}
		public function set_tel(int $tel)
		{
			$this->tel=$tel;
		}

		
		
	}

?>
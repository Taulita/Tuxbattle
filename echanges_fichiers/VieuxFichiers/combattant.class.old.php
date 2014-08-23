<?php
class Combattant
{
	private $id;
	private $nom;

	//ETAT DU COMBATTANT// 
	private $pv;
	private $armure;//Pour amortir les coups
	private $strength;
	private $force; //Pour la puissance du joueur suivant son experience
	private $agility; // Pour taper en premier , voir plus souvent & Pour esquiver

	//ARSENAL DE JEU//
	private $arme; //nom
	private $puissance; //puissance de l'arme
	private $potion;//nom
	private $rando;//action surprise (30% de taux de reussite)
	private $protection;//limiter les débats à subir par l'adversaire
	private $sort;//nom
	private $harakiri;// s'auto-attaque
	private $maxiDegats;// multiplication par 8 la force de frappe (%30 de taux de reussite
	
	private $damage;
	private $message; //Pour afficher les messages de notre joueur



	//CONSTRUCTEUR
	public function __construct()
	{
		$this -> force = $this -> strength;
		// $this->id=$combattant['id'];
		// $this->nom=$combattant['nom'];
		// $this->pv = $combattant['pv'];
		// $this->armure=$combattant['armure'];
		// $this->force = $combattant['force'];
		// $this->agility = $combattant['agility'];

	}


	//SET ARSENAL
	public function setArme($arme)
	{
		$this->arme = $arme['nom'];
		$this->agility= $arme['agility'];
		$this->puissance=$arme['puissance'];
	}

	public function setPotion($potion)
	{
		$this->potion = $potion['nom'];
		$this->pv+= $potion['pv'];
		if($potion['pv'] != 0 )
			$this->message2="Youpi!!";
		$this->protection=$potion['protection'];
		$this->rand=$potion['rand'];
	}

	public function setSort($sort)
	{
		$this->sort = $sort['nom'];
		$this->harakiri= $sort['harakiri'];
		$this->maxiDegats=$sort['megadegats'];
	}

	//EVOLUTION DE L'ETAT
	private function etat($pv)
	{
		if($this->pv > 1000)
		{
			$this->force-=2;
			$this->armure-=5;		
		}
		else if($this->pv > 500)
		{
			$this->force-=4;
			$this->armure-=10;	
		}
		else if($this->pv > 100)
		{
			$this->force-=6;
			$this->armure-=15;
			$this->agility-=3;
		}
		else if($this->pv > 50)
		{
			$this->force-=8;
			$this->armure-=20;
			$this->agility-=6;
			
		}
		else if($this->pv > 0)
		{
			$this->force-=10;
			$this->armure-=25;
			$this->agility-=9;
			
		}
	}


	//ACTION DE COMBAT	
	public function taper($joueur)
	{
		$this->damage=(($this->puissance/100)*$this->force);

		if($this->harakiri==1)
		{
			$reussite=rand(1,20);
			if($reussite==1)
			{
				$this->subir($this->damage, $this);
				$joueur->message ="'Hihihi, tu t'es tapé dessus!'";

			}		
		}

		else if($this->maxiDegats==1)
		{	
			$reussite=rand(1,20);
			if($reussite==1)
			{
				$this->damage=(($this->damage)*8);
				$joueur->subir($this->damage, $joueur);
				$this->message ="'Brûle dans les flammes de l'enfer!!'";
			}

			$joueur->subir($this->damage, $joueur);
	
		}

		else
		{
			$joueur->subir($this->damage, $joueur);

		}

	}






	public function subir($degats, $joueur)
	{

		if($this->rando==1)
		{
			$result=rand(1,3);
			if($result==1)
			{
				$this->armure+=25;
				if($this->armure>100)
					$this->armure=100;

				$this->message="Mon armure est plus solide.";

			}
			else if($result==2)
			{
				$this->force+=25;
				if($this->force>100)
					$this->force=100;

				$this->message="Je suis plus fort.";
			}
			else
			{
				$this->agility+=25;
				if($this->agility>100)
					$this->agility=100;
				$this->message="Je suis plus agile.";
			}
		}

		

		if($esquive==1)
		{
			if($this->protection==1)
				$joueur->message="Merci mon bouclier magique!";
			else
				$joueur->message="Joli coup mais tu ne m'as pas touché!!!! haha!";
		 	
		 }	

		else
		{
			$this->pv-=$degats;
			$this->message="Houch!";
			$this->etat($this->pv);
		}	
		
	}


	private function setEsquive()
	{
		
		$esquive=0;
		if($this->protection==1)
		{
			$esquive=rand(1,4);
			return $esquive;

		}
		else if($this->agility>=60)
		{
			if($this->armure>=75)
			{
				$esquive=rand(1,10);
				return $esquive;	
			}
		
			else if($this->armure>=50)
				{$esquive=rand(1,20);
							return $esquive;}
		
			else if($this->armure>=25)
				{$esquive=rand(1,30);
							return $esquive;}
		
			else
				{$esquive=rand(1,40);
							return $esquive;}
		}
		else if ($this->agility>=40)
		{
			if($this->armure>=75)
				{$esquive=rand(1,30);
							return $esquive;}
		
			else if($this->armure>=50)
				{$esquive=rand(1,40);
							return $esquive;}
		
			else if($this->armure>=25)
				{$esquive=rand(1,50);
							return $esquive;}
		
			else
				{$esquive=rand(1,60);
							return $esquive;}
		}
		else 
		{
			if($this->armure>=75)
				{$esquive=rand(1,50);
							return $esquive;}
		
			else if($this->armure>=50)
				{$esquive=rand(1,60);
							return $esquive;}
		
			else
				{$esquive=rand(1,70);
							return $esquive;}

		}
	}

	//A UTILISER DANS CONTENT
	public function isAlive()
	{
		if($this->pv>0)
			return true;
		else
			return false;
	}

	// A UTILISER POUR LA BAS DE DONNEE
	private function getId()
	{
		return $this->id;
	}
	private function getNom()
	{
		return $this->nom;
	}
	private function getArme()
	{
		return $this->arme;
	}
	private function getSort()
	{
		return $this->sort;
	}
	private function getPotion()
	{
		return $this->potion;
	}
	private function getDamage()
	{
		return $this->damage;
	}
	private function getPV()
	{
		return $this->pv;
	}
	private function getArmure()
	{
		return $this->armure;
	}
	private function getForce()
	{
		return $this->force;
	}
	private function getAgility()
	{
		return $this->agility;
	}

	private function getMessage()
	{
		return $this->message;
	}

	public function getPlayer()
	{
		$player=array();
		$player['id']=$this->getId();
		$player['nom']=$this->getNom();
		$player['pv']=$this->getPV();
		$player['arme']=$this->getArme();
		$player['sort']=$this->getSort();
		$player['potion']=$this->getPotion();
		$player['damage']=$this->getDamage();
		$player['armure']=$this->getArmure();
		$player['force']=$this->getForce();
		$player['agility']=$this->getAgility();
		$player['message']=$this->getMessage();
		return $player;
	}
	public function getEnemy($joueur)
	{
		$enemy=array();
		$enemy['id']=$joueur->getId();
		$enemy['nom']=$joueur->getNom();
		$enemy['pv']=$joueur->getPV();
		$enemy['armure']=$joueur->getArmure();
		$enemy['force']=$joueur->getForce();
		$enemy['agility']=$joueur->getAgility();
		$enemy['message']=$joueur->getMessage();
		return $enemy;
	}

}
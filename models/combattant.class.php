<?php
class Combattant
{
	private $id;
	private $nom;
	private $pv;

	private $strength;
	private $agility;
	private $armure;

	private $arme;
	private $sort;
	private $potion;

	private $damage;
	private $message;
	private $bouclier=0;
	private $esquive;
	private $coeff=1;
	private $harakiri;

	public function __construct()
	{
	}


	// FONCTION DE JEU //
	public function taper($joueur)
	{	
		if($this->harakiri==1)
		{	
			$reu=rand(1,20);
			if($reu==1)
			{
				$this->subir($this->damage*10/$this->armure);
				$joueur->message="Tu sais pas viser, tu t'es tapé dessus!";
			}
			else
				$joueur->message="Tu sais pas viser,  tu ne m'as pas touché!";
		}
		else
		{
			$joueur->subir($this->damage*10/$joueur->armure);
			
		}
	}

	public function subir($degats)
	{
		$this->setEsquive();
		if($this->bouclier==1)
		{
		 	$this->message="Bouclier Magique!";
		 	$this->bouclier=0;
		}
			
		else if($this->esquive==1)
			$this->message="Esquive!";
		else
		{
			$this->pv = $this->pv - $degats;
			$this->agility=$this->agility/$this->coeff;	
			$this->ajustDegat();
			$this->ajustEtat();
			$this->message="Houcht!";	
		}
		
	}

	// CALCUL DE L'ESQUIVE //

	private function setEsquive()
	{
		if($this->agility>=75)
		{
			$this->esquive=rand(1,10);
		}
		else if($this->agility>=50)
		{
			$this->esquive=rand(1,20);
		}
		else if($this->agility>=25)
		{
			$this->esquive=rand(1,40);
		}
		else
		{	
			$this->esquive=rand(1,70);
		}
	}

	
	// PREPARATION DE L'ARSENAL //
	private function setArme($arme)
	{
		$this->arme=$arme->getNom();
		$this->damage= $this->strength * $arme->getPuissance()/2;
		$this->coeff= $arme->getAgility()/100;
		$this->agility= $this->agility * $this->coeff;
	}

	private function setPotion($potion)
	{
		$this->potion=$potion->getNom();
		if($potion->getProtection()==1)
		{
			$this->bouclier=rand(1,4);
		}
		else if($potion->getRando()==1)
		{
			$reussite=rand(1,4);
			if($reussite==1)
			{
				$this->strength+=25;
				$this->message="J'ai plus de force!";
			}
			else if($reussite==2)
			{
				$this->armure+=25;
				$this->message="J'ai réparé mon armure!";
			}
			else if($reussite==3)
			{
				$this->agility+=25;
				$this->message="J'ai plus d'agilité!";
			}
			else
				$this->message="Damn, la potion n'a pas marché!";
		}
		else if($potion->getPv()==100)
		{
			$reussite=rand(1,2);
			if($reussite==1)
			{
				$this->pv+= $potion->getPv();
				$this->message="Cette potion est fantastique je me sens revivre!";	
			}
			else
				$this->message="Damn, la potion n'a pas marché!";
		}		
	}

	private function setSort($sort)
	{
		$this->sort=$sort->getNom();
		if($sort->getHarakiri()==1)
			$this->harakiri=1;
		else if($sort->getMegadegat()==1)
		{
			$reussite=rand(1,3);
			if($reussite==1)
			{
				$this->damage= $this->damage*2;
				$this->message="Brûle dans les flammes de l'enfer!";	
			}
		}	
	}

	
	// FONCTION DE MISE EN PLACE DE L'ARSENAL //
	public function setArsenal($arme, $potion, $sort)
	{
		$this->setArme($arme);
		$this->setPotion($potion);
		$this->setSort($sort);
		$this->ajustEtat();
	}

	// FONCTION SUR L'ETAT DU COMBATTANT //
	private function ajustStrenght()
	{
		if($this->strength>100)
			$this->strength=100;
		else if($this->strength<=0)
			$this->strength=1;
	}

	private function ajustArmure()
	{
		if($this->armure>100)
			$this->armure=100;
		else if($this->armure<=0)
			$this->armure=1;
	}

	private function ajustAgility()
	{
		if($this->agility>100)
			$this->agility=100;
		else if($this->agility<=0)
			$this->agility=1;
	}

	private function ajustEtat()
	{
		$this->ajustAgility();
		$this->ajustArmure();
		$this->ajustStrenght();
	}

	private function ajustDegat()
	{
		if($this->pv>=1000)
		{
			$this->strength-=5;
			$this->armure-=8;
		}
		else if($this->pv>=500)
		{
			$this->strength-=10;
			$this->armure-=16;
			$this->agility-=4;
		}
		else if($this->pv>=100)
		{
			$this->strength-=20;
			$this->armure-=32;
			$this->agility-=8;
		}
		else
		{
			$this->strength-=40;
			$this->armure-=64;
			$this->agility-=16;
		}
	}

	// PREPARATION DE L'AFFICHAGE //
	public function getId()
	{
		return $this->id;
	}
	private function getNom()
	{
		return $this->nom;
	}
	private function getAgility()
	{
		return $this->agility;
	}
	private function getStrength()
	{
		return $this->strength;
	}
	private function getArmure()
	{
		return $this->armure;
	}
	private function getPv()
	{
		return $this->pv;
	}
	private function getArme()
	{
		return $this->arme;
	}
	private function getBouclier()
	{
		return $this->bouclier;
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
	private function getMessage()
	{
		return $this->message;
	}


	// FONCTION POUR l'AFFICHAGE //
	public function getPlayer()
	{
		$player=array();
		$player['id']=$this->getId();
		$player['nom']= $this->getNom();
		$player['agility']=$this->getAgility();
		$player['strength']=$this->getStrength();
		$player['armure']=$this->getArmure();
		$player['bouclier']=$this->getBouclier();
		$player['pv']=$this->getPv();
		$player['arme']=$this->getArme();
		$player['sort']=$this->getSort();
		$player['potion']=$this->getPotion();
		$player['damage']=$this->getDamage();
		$player['message']=$this->getMessage();
		return $player;
	}
	public function getEnnemy($ennemy)
	{
		$enney=array();
		$enney['id']=$ennemy->getId();
		$enney['nom']=$ennemy->getNom();
		$enney['agility']=$ennemy->getAgility();
		$enney['strength']=$ennemy->getStrength();
		$enney['armure']=$ennemy->getArmure();
		$enney['pv']=$ennemy->getPV();
		$enney['message']=$ennemy->getMessage();
		$enney['bouclier']=$ennemy->getBouclier();
		return $enney;
	}

	// FONCTION FIN DE PARTIE //
	public function isAlive()
	{
		if ($this->pv > 0)
			return true;
		else
			return false;
	}
}
?>
<?php
class Potion
{
	private $id_weapon;
	private $nom;
	private $pv;
	private $rando;
	private $protection;

	public function __construct()
	{
		if ($this->id_weapon == null)
		{
			$this->pv=0;
			$this->rando=0;
			$this->protection=0;
			$this->nom="Pas de potion";
		}
	}

	public function getNom()
	{
		return $this->nom;
	}
	public function getPv()
	{
		return $this->pv;
	}
	public function getRando()
	{
		return $this->rando;
	}
	public function getProtection()
	{
		return $this->protection;
	}

}

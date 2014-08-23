<?php
class Arme
{
	private $id_weapon;
	private $nom;
	private $puissance;
	private $agility;

	public function __construct()
	{
	
	}

	public function getNom()
	{
		return $this->nom;
	}
	public function getAgility()
	{
		return $this->agility;
	}
	public function getPuissance()
	{
		return $this->puissance;
	}

}

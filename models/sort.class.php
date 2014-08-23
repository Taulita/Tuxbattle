<?php
class Sort
{
	private $id_weapon;
	private $nom;
	private $harakiri;
	private $megadegat;

	public function __construct()
	{
		if ($this->id_weapon == null)
		{
			$this->harakiri=0;
			$this->megadegat=0;
			$this->nom="Pas de sort";
		}
	}

	public function getNom()
	{
		return $this->nom;
	}
	public function getHarakiri()
	{
		return $this->harakiri;
	}
	public function getMegadegat()
	{
		return $this->megadegat;
	}

}

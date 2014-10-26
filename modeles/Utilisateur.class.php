<?php

class Utilisateur{

	private $idUtilisateur;
	private $sNomUtilisateur;
	
public function __construct($idUtilisateur=0, $sNomUtilisateur=" ")	
{
	$this->setIdUtilisateur($idUtilisateur);
	$this->setNomUtilisateur($sNomUtilisateur);
}

/**************LES SET******************/
	public function setIdUtilisateur($idUtilisateur)
	{
		TypeException::estNumerique($idUtilisateur);
		$this->idUtilisateur = $idUtilisateur;
	}//fin de la fonction setIdUtilisateur()
	
	
	public function setNomUtilisateur($sNomUtilisateur)
	{
		TypeException::estVide($sNomUtilisateur);
		TypeException::estString($sNomUtilisateur);
		$this->sNomUtilisateur= $sNomUtilisateur;
	}//fin de la fonction setNomUtilisateur()
	
	
/**************LES GET******************/
	public function getIdUtilisateur()
	{
		return $this->idUtilisateur;
	}//fin de la fonction getIdUtilisateur()
	
	public function getNomUtilisateur()
	{
		return htmlentities($this->sNomUtilisateur);
	}//fin de la fonction getNomUtilisateur()	
}
<?php

namespace App\Banque;
/**
 * Compte épargne
 */
class CompteEpargne extends Compte
{
    /**
     * Taux d'intérêt
     *
     * @var float
     */
    private float $interet;

    /**
     * Création d'un compte épargne
     *
     * @param string $titulaire
     * @param float $solde
     * @param float $interet taux d'inétêt
     */
    public function __construct(string $titulaire, float $solde, float $interet)
    {
        parent::__construct($titulaire, $solde);
        $this->interet = $interet;
    }


	/**
	 * @return 
	 */
	public function getInteret(): float 
    {
		return $this->interet;
	}
	
	/**
	 * @param  $interet 
	 * @return self
	 */
	public function setInteret(float $interet): self 
    {
		$this->interet = $interet;
		return $this;
	}

    /**
     * verser des interets
     *
     * @return self
     */
    public function verserInteret():self
    {
        $this->solde *= $this->interet;
        return $this;
    }
}
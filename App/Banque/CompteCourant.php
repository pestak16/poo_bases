<?php

namespace App\Banque;
use \Exception;
/**
 * Compte bancaire courant
 */
class CompteCourant extends Compte
{
    /**
     * Découvert autorisé
     *
     * @var integer
     */
    private int $decouvert = 0;

    /**
     * Cr&ation d'un compte courant
     *
     * @param string $titulaire
     * @param float $solde
     * @param integer|null $decouvert découvert autorisé
     */
     public function __construct(string $titulaire, float $solde, int $decouvert=null)
    {
        parent::__construct($titulaire, $solde);
        if(!is_null($decouvert)){
            $this->decouvert = $decouvert;
        }
    }

	/**
	 * @return 
	 */
	public function getDecouvert(): int {
		return $this->decouvert;
	}
	
	/**
	 * @param  $decouvert 
	 * @return self
	 */
	public function setDecouvert(int $decouvert): self {
		$this->decouvert = $decouvert;
		return $this;
	}

    /**
     * retirer du fric
     *
     * @param float $montant
     * @return self
     */
    public function retirer(float $montant):self
    {
        $this->verifierMontant($montant);
        if($montant <= $this->solde + $this->decouvert){
            $this->solde -= $montant; //parent::retirer($montant)
        }else{
            throw new Exception('Solde insuffisant');
        }
        return $this;
    }


}
<?php


declare(strict_types=1);


namespace App\Banque;
use \Exception;



/**
 * Compte bancaire
 */
abstract class Compte
{
    /**
     * titulaire du compte
     *
     * @var string
     */
    protected string  $titulaire;

    /**
     * solde du compte
     *
     * @var float
     */
    protected float $solde;

    static protected $instances = 0;

    /**
     * Instanciation d'un objet Compte
     *
     * @param string $titulaire titualire du compte
     * @param float $solde solde du compte
     */
    public function __construct(string $titulaire, float $solde)
    {
        $this->verifierMontant($solde);
        $this->titulaire = $titulaire;
        $this->solde = $solde;
        self::$instances++;
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

        if($montant <= $this->solde){
            
            $this->solde -= $montant;  
        }else{
            throw new Exception('Solde insuffisant');
        }
       
      
       
        return $this;
    }


    /**
     * Déposer du fric
     *
     * @param float $montant
     * @return self
     */
    public function deposer(float $montant): self
    {
        $this->verifierMontant($montant);
       $this->solde += $montant; 
       return $this;
    }

    /**
     * Virer de l'argent sur un autre
     *
     * @param Compte $compte compte sur lequel virer de l'aregnt
     * @param float $montant
     * @return self
     */
    public function virer(Compte $compte, float $montant ):self
    {
        $this->verifierMontant($montant);
        $this->retirer($montant);
        $compte->deposer($montant);
        return $this;
    }


    /**
     * Verifie que le monant soit positif
     *
     * @param float $montant
     * @return void
     */
    protected function verifierMontant(float $montant)
    {
        if($montant <=0 )
        {
            throw new Exception('Montant invalide');
        }
    }


	/**
	 * @return 
	 */
	public function getTitulaire(): string 
    {
		return $this->titulaire;
	}
	
	/**
	 * @param  $titulaire 
	 * @return self
	 */
	public function setTitulaire(string $titulaire): self 
    {
		$this->titulaire = $titulaire;
		return $this;
	}

    /**
     * Get the value of solde
     *
     * @return float
     */
    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * Set the value of solde
     *
     * @param float $solde
     *
     * @return self
     */
    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public static function getInstances(): int
    {
        return self::$instances;
    }
}
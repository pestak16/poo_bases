<?php
use App\Autoloader;
use App\Banque\CompteCourant;
use App\Banque\CompteEpargne;
use App\Client\Compte as ClientCompte;

require_once 'App/Autoloader.php';
Autoloader::register();

$compte1 = new CompteEpargne('David', 300, 1.05);
$david = new ClientCompte( );
$renaud = new ClientCompte();
$compte2 = new CompteCourant('Renaud', 7000);

$compte2->virer($compte1, 3000);
$compte1->verserInteret();

var_dump($compte1, $compte2, $renaud, $david);





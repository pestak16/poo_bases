<?php

namespace App;
/**
 * classe permettant de charger les fichiers de classe
 */
class Autoloader
{
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($fqcn)
    {
       $class = $fqcn;
      $class = str_replace(__NAMESPACE__, '', $class);
      $class = str_replace('\\', '/', $class);
      $class = __DIR__. $class . '.php';
 require $class;  
        
      

    }

}
<?php
namespace App\Routes;

class Route{
    public static function getBrackets($string){
        preg_match('/{[^}]+}$/', $string, $matches);
        return $matches[0]??$string; 
     }
     public static function removeBrackets($string){
        $pattern = '/{[^}]+}/';
        $string = preg_replace($pattern, '', $string);
        return $string;
     }
    
    public static function get(String $url, Callable $executable){
        $domaine = $_SERVER['REQUEST_URI'];
        // Vérifier si l'URL correspond exactement à la route
        
       
        if ($url == $domaine) {
         return   $executable();
        // Vérifier si l'URL contient un paramètre
        } else  {
            $lien = Route::removeBrackets($url);
           
             
            if (preg_match('#^' . $lien . '([a-zA-Z0-9._-]+)$#', $domaine, $matches) && $lien!=$url){
                $id = $matches[1];
            return $executable($id);
            }
            
        }
    }
}
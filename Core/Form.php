<?php
namespace LateMotivApp\Core;


// on génère les formulaires de l'application
class Form
{
    //Cette méthode vérifie et Valide si tous les champs proposés sont remplis
    public static function validate(array $form, array $fields)
    {
        // On parcourt les champs
        foreach($fields as $field){
            // Si le champ est absent ou vide
            if(!isset($form[$field]) || empty($form[$field])){
                // On  retourne false
                return false;
            }
        }
        return true;
    }

}
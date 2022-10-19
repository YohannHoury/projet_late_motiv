<?php
namespace LateMotivApp\Controllers;

abstract class Controller
{       //la fonction render va récupérer les donnès les enregistrer grâce à ob_start() les stocker et afficher dans le template avec ob_get_clean()
    public function render(string $file, array $data = [], string $template = 'layout')
    {
        // On extrait $donnees
        extract($data);

        // On commence à enregistrer
        ob_start();
        // A partir de ce point toute sortie est conservée en mémoire

        // On crée le chemin vers la vue
        require_once (ROOT.'/Views/'.$file.'.phtml');

        // résultat de l'enregistrement dans $content
        $content = ob_get_clean();

        // Template de page
        require_once(ROOT.'/Views/'.$template.'.phtml');
        
        $head = require_once(ROOT.'/Views/partials/_head.phtml');
        
        $footer= require_once(ROOT.'/Views/partials/_footer.phtml');
    }
    
}

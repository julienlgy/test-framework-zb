<?

namespace Zonebourse\Controller;

use Zonebourse\Internal\Request;

class AbstractController {
    /**
     * Dans cette classe, on définit toute les variables qui seront globales à toute les URL.
     * Par exemple : la session, l'utilisateur, la langue. 
     * 
     * (Du moins les accès aux classes qui gèrent ça, dans le contructeur on appel les classes importantes à ZB)
     */

     protected $twigEngine;
     protected $request;

     function __construct() {
        $loader = new \Twig\Loader\FilesystemLoader('./../templates');
         $this->twigEngine = new \Twig\Environment($loader, [
            'cache' => './../var/cache',
        ]);
        $this->request = new Request();
     }
}

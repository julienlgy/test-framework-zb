<?php

namespace Zonebourse\Controller;

use Zonebourse\Internal\AbstractController;

use Zonebourse\Service\Quotation\Example;
use function Zonebourse\Service\callUserFonc;

class HomeController extends AbstractController {

    function routeHome() {
        
        $ex = new Example();
        $data =  $ex->getQuotation();

        return $this->twigEngine->render('Home/home.twig', [
                "test" => $data
        ]);
    }

    function routeAbout() {
        $this->response->setContent(
            "Cette réponse utilise la classe Response, qui sera intérprêtée dans le rendu final."
        );
        $this->response->setStatus(201);
        return $this->response;
    }

    function routeRaphael() {
        $age = $this->request->get('age') ?? "pas d'";
        $prenom = $this->request->get('prenom');
        $p = callUserFonc($prenom);
        return "$prenom bonjour toi tu vas bien ! :), tu as $age ans,     $p";
    }

}
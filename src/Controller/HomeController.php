<?php

namespace Zonebourse\Controller;

use Zonebourse\Service\Quotation\Example;
use function Zonebourse\Service\callUserFonc;

class HomeController extends AbstractController {

    function routeHome() {
        
        $ex = new Example();
        $data =  $ex->getQuotation();

        $this->response->setContent(
            $this->twigEngine->render('Home/home.twig', [
                "test" => $data
            ])
        );
        return $this->response;
    }

    function routeAbout() {
        $this->response->setContent(
            "coucou Raphael"
        );
        return $this->response;
    }

    function routeRaphael() {
        callUserFonc();
        $age = $this->request->get('age') ?? "pas d'";
        $prenom = $this->request->get('prenom');
        return "$prenom bonjour toi tu vas bien ! :), tu as $age ans ";
    }

}
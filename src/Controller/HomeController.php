<?php

namespace Zonebourse\Controller;

use Zonebourse\Service\Quotation\Example;
use function Zonebourse\Service\callUserFonc;

class HomeController extends AbstractController {

    function routeHome() {
        echo "La fonction routeHome du HomeController reçoit une requête ".$this->request->getMethod(). "<br>";
        if ($testParameter = $this->request->get('test')) {
            echo "Le paramètre test contient : $testParameter <br>";
        }
        $ex = new Example();
        $data =  $ex->getQuotation();

        return $this->twigEngine->render('Home/home.twig', [
            "test" => $data
        ]);
    }

    function routeAbout() {
        return "About créée";   
    }

    function routeRaphael() {
        callUserFonc();
        $age = $this->request->get('age') ?? "pas d'";
        $prenom = $this->request->get('prenom');
        return "$prenom bonjour toi tu vas bien ! :), tu as $age ans ";
    }

}
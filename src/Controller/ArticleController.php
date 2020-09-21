<?php

namespace Zonebourse\Controller;

use Zonebourse\Internal\AbstractController;

class ArticleController extends AbstractController {
    function routeArticle() {
        $articleNumber = $this->request->get('idArticle');
        return $this->twigEngine->render('Article/article.twig', [
            "idArticle" => $articleNumber
        ]);
    }
}
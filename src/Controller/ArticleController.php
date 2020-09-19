<?php

namespace Zonebourse\Controller;

class ArticleController extends AbstractController {
    function routeArticle() {
        return $this->twigEngine->render('Article/article.twig');
    }
}
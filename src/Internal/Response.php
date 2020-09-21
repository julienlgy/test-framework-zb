<?php

namespace Zonebourse\Internal;

class Response {
    private $status;
    private $headers;
    private $contentType;
    private $content;

    static function send404() {
        $response = new Response();
        $response->setStatus("404");
        $response->setContent("404 page not found.");
        return $response->prepare();
    }

    static function send500() {
        $response = new Response();
        $response->setStatus(500);
        $response->setContent("500 internal server error");
        return $response->prepare();
    }

    function __construct() {
        $this->setStatus(200);
        $this->clearHeaders();
        $this->setContentType("text/html");
    }
    
    function send() {
        $this->prepare();
        echo $this->content;
    }

    function prepare() {
        http_response_code($this->getStatus());
        foreach($this->headers as $key => $value) {
            header("$key: $value");
        }
        header('Content-Type: '.$this->contentType);
        return $this;

    }

    function setContent($content) {
        $this->content = $content;
        return $this;
    }
    function getContent() {
        return $this->content;
    }
    function pushContent($content) {
        $this->content .= $content;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    function getStatus() {
        return $this->status;
    }
    function setContentType($type) {
        $this->contentType = $type;
    }
    function getContentType() {
        return $this->contentType;
    }

    function setHeaders($headers) {
        $this->headers = $headers;
    }
    function addHeader($key, $value) {
        array_push($this->headers, [$key => $value]);
    }
    function clearHeaders() {
        $this->headers = [];
    }
    function addCors() {
        header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Max-Age: 1728000');
        header('Access-Control-Allow-Methods: POST,GET');
        header('Access-Control-Allow-Headers: Content-MD5, X-Alt-Referer');
        header('Access-Control-Allow-Credentials: true');
    }
    function getHeaders() {
        return $this->headers;
    }


    function __toString() {
        return $this->content;
    }
}
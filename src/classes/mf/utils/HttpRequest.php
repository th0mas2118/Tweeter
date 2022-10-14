<?php

require_once "AbstractHttpRequest.php";
class HttpRequest extends AbstractHttpRequest{
    function __constructor(){
        $this->script_name = $_SERVER['SCRIPT_NAME'];
        $this->path_info = $_SERVER['PATH_INFO'];
        $this->root = dirname($_SERVER['SCRIPT_NAME']);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
}
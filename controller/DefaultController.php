<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/Controller.php';

class DefaultController implements Controller
{
    public function defaultAction()
    {
        echo "This is index.";
    }
}


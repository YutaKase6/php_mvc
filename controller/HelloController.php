<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controller/Controller.php';

class HelloController implements Controller
{
    public function helloAction()
    {
        echo 'Hello world!' . "\n";
    }

    public function defaultAction()
    {
        echo "Hello Controller Index." . "\n";
    }
}

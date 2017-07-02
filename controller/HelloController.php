<?php

require_once __DIR__ . '/AbstractController.php';

class HelloController extends AbstractController
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

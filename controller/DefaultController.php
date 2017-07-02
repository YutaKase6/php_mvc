<?php

require_once __DIR__ . '/AbstractController.php';

class DefaultController extends AbstractController
{
    public function defaultAction()
    {
        echo "This is index.";
    }
}


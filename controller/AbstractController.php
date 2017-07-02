<?php

require_once __DIR__ . '/Controller.php';

abstract class AbstractController implements Controller
{
    const VIEW_DIR = __DIR__ . '/../view';
    const LIB_DIR = __DIR__ . '/../lib';
}

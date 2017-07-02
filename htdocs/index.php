<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../controller/Dispatcher.php';

$dispatcher = new Dispatcher($_SERVER['DOCUMENT_ROOT']);
$dispatcher->dispatch();
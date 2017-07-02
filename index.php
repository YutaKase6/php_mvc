<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Dispatcher.php';

$dispatcher = new Dispatcher($_SERVER['DOCUMENT_ROOT']);
$dispatcher->dispatch();
<?php
if (file_exists($_SERVER["REQUEST_FILENAME"])) {
    return false;
} else {
    require "index.php";
}

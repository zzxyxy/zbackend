<?php

include 'vendor/autoload.php';
foreach (glob("src/*.php") as $filename) {
    include $filename;
}

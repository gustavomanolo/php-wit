<?php

    require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

    use Gustavomanolo\WitPhp;

    $wit = new WitPhp\Wit('VDHFDYLOZ3HJTW6NN6SCSZAWNBA4AHZM');


    $response = $wit->message("¿Cuál será el clima en la ciudad de México?");
    
    //print_r( $response['entities'] );
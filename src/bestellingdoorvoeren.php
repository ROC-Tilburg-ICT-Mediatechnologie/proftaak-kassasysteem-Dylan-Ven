<?php

namespace Acme;
use Acme\classes\Bestelling;

require "../vendor/autoload.php";

if ($idTafel = $_POST['idtafel'] ?? false) {
    $b = new Bestelling(((int)$idTafel));
    // TODO: De bestelling doorvoeren in de database (maak gebruik van de Bestelling class)
    $order = $_POST['products'];
    foreach($order as $product){
        $b->addProducts($order);
        $b->saveBestelling();
    }
} else {
    http_response_code(404);
    include('error_404.php');
    die();
}


// header("Location: index.php");

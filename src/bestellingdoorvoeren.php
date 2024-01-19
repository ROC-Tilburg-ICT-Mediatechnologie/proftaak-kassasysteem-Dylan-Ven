<?php

namespace Acme;
use Acme\classes\Bestelling;

require "../vendor/autoload.php";

if ($idTafel = $_POST['idtafel'] ?? false) {
    $b = new Bestelling(((int)$idTafel));
    // TODO: De bestelling doorvoeren in de database (maak gebruik van de Bestelling class)
    $order = $_POST['products'];
    //deze Function is om de array te checken of er alleen maar nummers in de array staan
    function containsOnlyNumbers($order) {
        foreach ($order as $value)
        {
            if (!preg_match('/^\d+$/', $value))
            {
                return false;
            }
        }
        return true;
    }
        if (containsOnlyNumbers($order)) {
            $b->addProducts($order);
            
            echo "Order successful";
        } else {
            echo "Order canceled";
        }

    $b->saveBestelling();

} else {
    http_response_code(404);
    include('error_404.php');
    die();
}

header("Location: index.php");

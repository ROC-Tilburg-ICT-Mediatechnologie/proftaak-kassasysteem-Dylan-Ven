<?php

namespace Acme;
use Acme\classes\Bestelling;

require "../vendor/autoload.php";

if ($idTafel = $_POST['idtafel'] ?? false) {
    $b = new Bestelling(((int)$idTafel));
    $producten = [];
    // TODO: De bestelling doorvoeren in de database (maak gebruik van de Bestelling class)
// var_dump($_POST['products']);
foreach($_POST["products"] as $product){
    $numberOfProducts = $_POST["products"] ?? 0;

}
echo "<br><br><br>";
var_dump($product);

// $bestelling->addProducts($producten);
// $bestelling->saveBestelling();
} else {
    http_response_code(404);
    include('error_404.php');
    die();
}


// header("Location: index.php");
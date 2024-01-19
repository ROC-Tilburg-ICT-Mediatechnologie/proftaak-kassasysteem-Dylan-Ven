<?php

namespace Acme\classes;

use Acme\model\ProductModel;
use Acme\model\ProductTafelModel;
use Acme\model\TafelModel;
use DateTime;

class Rekening
{

    public function setPaid($idTafel): void
    {
        //Hier checkt de function of de tafel uberhaupt een bestelling heeft
        $tm = new ProductTafelModel();
        $tm->getBestelling($idTafel);
        if (isset($bestelling['idTafel'])) {
            $bestelling['betaald'] = "1";
    }
}

    /**
     * @param $idTafel
     *
     * @return array
     */
    public function getBill($idTafel): array
    {
        $bill = [];
        $bm = new ProductTafelModel();
        $bestelling = $bm->getBestelling($idTafel);

        $tm = new TafelModel();

        $bill['tafel'] = $tm->getTafel($idTafel);
        $bill['datumtijd'] = [
            'timestamp' => $bestelling['datumtijd'],
            'formatted' => date(
                'dd-mm-yyyy',
                $bestelling['datumtijd']
            )
        ];
        if (isset($bestelling['products'])) {
            foreach ($bestelling['products'] as $idProduct) {
                if(!isset($bill['products'][$idProduct]['data'])) {
                    $bill['products'][$idProduct]['data'] = (new ProductModel(
                    ))->getProduct(
                        $idProduct
                    );
                }
                if (!isset($bill['products'][$idProduct]['aantal']))
                {
                     $bill['products'][$idProduct]['aantal'] = 0;
                $bill['products'][$idProduct]['aantal']++;
            }
            }
        }

        //TODO: 'totaal' toevoegen aan de rekening
        if (isset($bestelling[$idTafel])) {
            // Haal de prijs van het product op
            $productPrijs = $idProduct->getProduct($idProduct['prijs']);
    
            // Bereken het totaalbedrag
            $totaalBedrag = $productPrijs * $bill['aantal'];
    
            // Voeg het 'totaal' toe aan de rekening
            $bill['total'] = $totaalBedrag;
    
        return $bill;
    }

}
}

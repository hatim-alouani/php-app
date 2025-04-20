<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/InscriptionModel.php';

class ListInscriptionsTest extends TestCase
{
    public function testListInscriptionsReturnsArray()
    {
        $inscriptionModel = new InscriptionModel();
        $inscriptions = $inscriptionModel->getAllInscriptions(); // Make sure this method exists
        $this->assertIsArray($inscriptions);
    }
}

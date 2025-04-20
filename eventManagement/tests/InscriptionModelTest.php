<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/InscriptionModel.php';

class InscriptionModelTest extends TestCase
{
    public function testInscriptionModelCanBeInstantiated()
    {
        $inscriptionModel = new InscriptionModel();
        $this->assertInstanceOf(InscriptionModel::class, $inscriptionModel);
    }
}

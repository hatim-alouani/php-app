<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/ParticipantModel.php';

class ParticipantModelTest extends TestCase
{
    public function testParticipantModelCanBeInstantiated()
    {
        $participantModel = new ParticipantModel();
        $this->assertInstanceOf(ParticipantModel::class, $participantModel);
    }
}

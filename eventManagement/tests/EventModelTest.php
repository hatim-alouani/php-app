<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/EventModel.php';

class EventModelTest extends TestCase
{
    public function testEventModelCanBeInstantiated()
    {
        $eventModel = new EventModel();
        $this->assertInstanceOf(EventModel::class, $eventModel);
    }
}

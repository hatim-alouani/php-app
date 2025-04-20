<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/EventModel.php';

class ListEventsTest extends TestCase
{
    public function testListEventsReturnsArray()
    {
        $eventModel = new EventModel();
        $events = $eventModel->getAllEvents(); // Make sure this method exists
        $this->assertIsArray($events);
    }
}

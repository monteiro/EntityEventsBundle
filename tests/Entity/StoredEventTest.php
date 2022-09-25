<?php

namespace Entity;

use Monteiro\EntityEventsBundle\Entity\StoredEvent;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Clock\MockClock;

class StoredEventTest extends TestCase
{
    /**
     * @covers \Monteiro\EntityEventsBundle\Entity\StoredEvent::__construct
     */
    public function testItShouldCreateAStoredEvent()
    {
        $storedEventOccurredOn = new \DateTimeImmutable('2021-01-01 00:00:00');
        $clock = new MockClock($storedEventOccurredOn);

        $eventBody = [
            'foo' => 'bar',
        ];

        $storedEvent = new StoredEvent(
            'id',
            'typeName',
            $eventBody,
            'aggregateRootId',
            $clock,
            'actorId'
        );

        $this->assertEquals($storedEventOccurredOn->getTimestamp(), $storedEvent->getOccurredOn()->getTimestamp());
        $this->assertEquals('id', $storedEvent->getId());
        $this->assertEquals('typeName', $storedEvent->getTypeName());
        $this->assertEquals($eventBody, $storedEvent->getEventBody());
        $this->assertEquals('aggregateRootId', $storedEvent->getAggregateRootId());
        $this->assertEquals('actorId', $storedEvent->getActorId());
    }
}

<?php

namespace Monteiro\EntityEventsBundle\Entity;

use Symfony\Component\Clock\ClockInterface;

class StoredEvent
{
    private string $id;
    private string $typeName;
    private array $eventBody;
    private string $aggregateRootId;
    private ?string $actorId;
    private string $published;
    private \DateTimeImmutable $occurredOn;

    public function __construct(
        string $id,
        string $typeName,
        array $eventBody,
        string $aggregateRootId,
        ClockInterface $clock,
        ?string $actorId
    ) {
        $this->id = $id;
        $this->typeName = $typeName;
        $this->eventBody = $eventBody;
        $this->aggregateRootId = $aggregateRootId;
        $this->actorId = $actorId;

        $this->published = false;
        $this->occurredOn = $clock->now();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function getEventBody(): array
    {
        return $this->eventBody;
    }

    public function getAggregateRootId(): string
    {
        return $this->aggregateRootId;
    }

    public function getActorId(): ?string
    {
        return $this->actorId;
    }

    public function isPublished(): bool
    {
        return $this->published;
    }

    public function markAsPublished(): void
    {
        $this->published = true;
    }

    public function getOccurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
